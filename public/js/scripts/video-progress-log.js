

// Video Course JS
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

var currentStreamingVideo = null;
$(function() {
	$('#lila-video').on('mouseenter', '.language-switcher', function() {
		$(this).find(".vjs-multilngual_list").removeClass("invisible");
	 }).on('mouseleave', '.language-switcher', function() {
		$(this).find(".vjs-multilngual_list").addClass("invisible");
	 }).on('touchstart', '.language-switcher', function() {
		$(this).find(".vjs-multilngual_list").toggleClass("invisible");
	 });

	var $language_selector = $('input[type=radio][name=language_selector]');
    $language_selector.filter('[value='+localStorage.getItem("multilingual_choice")+']').prop('checked', true);

	$language_selector.on('change', function() {

		if(!currentStreamingVideo) return;
		const selected_lang = this.value
		const default_stream_video = currentStreamingVideo.filter((video_list) => {
			return (selected_lang == video_list.lang_code);
		});

		if(default_stream_video.length > 0)
			setVideoPlayerSrc(default_stream_video[0]);
	});

	$.ajax({
		type: 'POST',
		url: "/learn/course_preview/" + course_id,
		success: function(response){
			let data = response.data;
			loadPlayer(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			$('#locked_login').modal('show');
		}  
    });
})

var video_id;
var lilaPlayer = videojs('lila-video',{errorDisplay: false, preload: 'auto'});
lilaPlayer.ready(function () {

  var promise = this.play();
  var that = this;

  if (promise !== undefined) {
    promise.catch(function(error) {
      that.muted(true);
      that.play();
    });
  }

  this.userActive(false);

    var progress_log = [], debounce = true;

    var updateProgress = function() {
        
        let currentTime = this.currentTime();
        var intPlayedTime = parseInt(currentTime, 10);
        var isFifteen     = intPlayedTime % 20 == 0 && intPlayedTime !== 0;
        if (isFifteen && debounce && progress_log.findIndex(x => x.position == intPlayedTime ) < 0) {
            debounce = false;
            progress_log.push({
                "position": intPlayedTime,
                "time": moment().format(),
                // "time": toLocal(new Date()),
                "total": parseInt(this.duration(), 10)
            });

            if(progress_log.length >= 3){

                $.ajax({
                    type: 'POST',
                    url: "/subscribed-courses/" + course_id + "/" + video_id + "/progress-logs",
                    data: JSON.stringify(progress_log),
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(response){
                      let data = response.data;
                      console.log(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        // alert("You need to Login/Subscribe");
                    }  
                  });

                setTimeout(function() {
                    progress_log = []
                }, 1000);
            }
        } else {
            debounce = true;
        }
    };

    var endProgress = function() {
      
        $.ajax({
            type: 'POST',
            url: "/subscribed-courses/" + course_id + "/" + video_id + "/completion",
            data: JSON.stringify({currentTime: parseInt(this.currentTime())}),
            contentType: "application/json",
            dataType: 'json',
        });

        $.ajax({
            type: 'POST',
            url: "/subscribed-courses/" + course_id + "/" + video_id + "/progress-logs",
            data: JSON.stringify(progress_log),
            contentType: "application/json",
            dataType: 'json',
        });
		
		if(!video_id){
			$($('.la-vcourse__lesson')[0]).trigger("click");
		}else if($('#vcourse__lesson_'+(1+parseInt(video_id))).length > 0)
			$('#vcourse__lesson_'+(1+parseInt(video_id))).trigger("click");
  };

    this.on('timeupdate', updateProgress);
    this.on('ended', endProgress);

    this.on('useractive', function(){
		$('.language-switcher').removeClass('invisible');
	});
    this.on('userinactive', function(){
		$('.language-switcher').addClass('invisible');
	});
});

$('.la-vcourse__lesson').on('click', function() {

    video_id = $(this).attr('data-video-id');
    $('.la-vcourse__lesson').removeClass('active');
    $(this).addClass('active');
  
	$.ajax({
		type: 'POST',
		url: "/learn/course/" + video_id,
		data:{video_id:video_id},
		success: function(response){
			let data = response.data;	
			loadPlayer(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			$('#locked_login').modal('show');
		}  
    });
  
}); 

function loadPlayer(data) {
	$('.la-vlesson__title').text(data.title);

	lilaPlayer.poster(data.poster)

	var lang_list = data.multilingual;
	currentStreamingVideo = lang_list;

	const MenuButton = videojs.getComponent('MenuButton');
	const MenuItem = videojs.getComponent('MenuItem');

	var menuButton = new MenuButton(lilaPlayer);
	var langMenu = menuButton.createMenu();
	langMenu.addClass('vjs-multilngual_list');
	langMenu.addClass('invisible');

	var default_item = new MenuItem(lilaPlayer, { label:'Audio Language', selectable: false});
	default_item.addClass('vjs-multilngual_default_item');
	langMenu.addItem(default_item);


	const default_stream_video = lang_list.filter((video_list) => {
		return (localStorage.getItem("multilingual_choice") == video_list.lang_code);
	});

	if(default_stream_video.length == 1)
		setVideoPlayerSrc(default_stream_video[0]);

	for(let i=0; i < lang_list.length; i++){

		const currentLangList = lang_list[i];
		var lang_item = new MenuItem(lilaPlayer,{label:currentLangList.lang, selectable: true});
		lang_item.addClass('vjs-multilngual_item');

		if( ( default_stream_video.length > 0 && currentLangList.lang_code == default_stream_video[0].lang_code) || (default_stream_video.length == 0 && i == 0) ){
			var $language_selector = $('input[type=radio][name=language_selector]');
    		$language_selector.filter('[value='+currentLangList.lang_code+']').prop('checked', true);
			
			setVideoPlayerSrc(currentLangList);
			lang_item.selected(true);
		}

		lang_item.on('tap',function(){
			choosingLang(currentLangList, langMenu, this);
		})
		lang_item.on('click',function(){
			choosingLang(currentLangList, langMenu, this);
		})
		langMenu.addItem(lang_item);
	}

	if($('.language-switcher').length > 0)
		$('.language-switcher').remove();

	var button = lilaPlayer.addChild('button', { text: "Lang" });
	button.addClass("language-switcher");
	button.addChild(langMenu);

	var lang_icon = document.createElement('div');
	lang_icon.innerHTML = "<i class='icon-change-language' aria-hidden='true'></i>";
	button.el().insertBefore(lang_icon, button.el().firstChild);

	button.addChild(lang_icon);


	if(lilaPlayer.controlBar.getChild('QualitySelector') == undefined)
	lilaPlayer.controlBar.addChild('QualitySelector');

	lilaPlayer.play();

	lilaPlayer.on('error', function(e) {
		console.log(e);
		console.log(lilaPlayer.error());

		e.stopImmediatePropagation();
			var error = this.player().error();
			console.log('error!', error.code, error.type , error.message);
	});
}

function choosingLang(currentLangList, langMenu, referenceTrack) {
	localStorage.setItem("multilingual_choice", currentLangList.lang_code);
	var $language_selector = $('input[type=radio][name=language_selector]');
	$language_selector.filter('[value='+currentLangList.lang_code+']').prop('checked', true);
	setVideoPlayerSrc(currentLangList);

	const tracks = langMenu.children();
	for (let i = 0; i < tracks.length; i++) {
		const track = tracks[i];
		if (track !== referenceTrack) {
			track.removeClass('vjs-selected')
			track.mode = 'disabled';
		}
	}
	$(".vjs-multilngual_list").addClass("invisible");
}

function setVideoPlayerSrc(currentLangList) {
	
	const stream_path = currentLangList.stream_url;
	lilaPlayer.src([
		{
			src: stream_path,
			type: 'application/x-mpegURL',
			label: 'Auto',
			selected: true,
		},
		{
			src: stream_path+'?clientBandwidthHint=5',
			type: 'application/x-mpegURL',
			label: '1080P',
		},
		{
			src: stream_path+'?clientBandwidthHint=3.6',
			type: 'application/x-mpegURL',
			label: '720P',
		},
		{
			src: stream_path+'?clientBandwidthHint=2.4',
			type: 'application/x-mpegURL',
			label: '480P',
		},
		{
			src: stream_path+'?clientBandwidthHint=1',
			type: 'application/x-mpegURL',
			label: '360P',
		},
		{
			src: stream_path+'?clientBandwidthHint=0.6',
			type: 'application/x-mpegURL',
			label: '240p',
		},
	]);
}

var date = new Date();
function toLocal (date) {
	var local = new Date(date),
    zoneOffset = date.getTimezoneOffset();
	local.setMinutes(date.getMinutes() - zoneOffset);
	return local.toJSON().slice(0, -1) + (zoneOffset < 0 ? "+" : "-") + ( Math.floor( Math.abs(zoneOffset) / 60))  + ":" + Math.abs(zoneOffset % 60);
}