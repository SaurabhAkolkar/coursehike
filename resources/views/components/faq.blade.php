<div class="panel panel-default la-bgcreator__faq-panel mt-2">
    <div class="panel-heading la-bgcreator__panel-head py-2 px-5" id= {{ $mainId }} >
        <span class="panel-title la-bgcreator__panel-title mx-4 mx-sm-5">
            <a class="accordion-toggle collapsed text-md" href= "#{{ $subId }}" data-toggle="collapse" aria-expanded="true" aria-controls="#{{ $subId }}" >
                {{ $question }}
            </a>
        </span>
    </div>

    <div class="panel-collapse collapse " id= {{ $subId }} aria-labelledby= {{ $mainId }} data-parent="#accordion">
        <div class="panel-body la-bgcreator__panel-body py-4 px-5 mx-5">
            <p class="panel-text text-md">{{ $answer }}</p>
        </div>
    </div>
</div>
     
        