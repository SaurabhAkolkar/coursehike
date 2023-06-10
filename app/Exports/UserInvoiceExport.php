<?php

namespace App\Exports;

use App\UserInvoiceDetail;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserInvoiceExport implements FromArray, WithHeadings
{
    protected $invoices;

   

    public function __construct(array $invoices)
    {
        $this->invoices = $invoices;
    }

    public function headings(): array
    {
        return [
            '#',
            'Course Name',
            'User',
            'Type Of Purchase',
            'Coupon Applied',
            'Sub Total',
            'Date of Purchase'
        ];
    }
    
    public function array(): array
    {
        return $this->invoices;
    }
}