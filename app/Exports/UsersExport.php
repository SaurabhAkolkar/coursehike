<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromArray, WithHeadings
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
            'User Name',
            'Email',
            'Role',
            'Mobile Number',
            'Date of Birth',
            'Gender',
            'Registration Date',
            'City',
            'State',
            'Country',
            'Pincode',
        ];
    }
    
    public function array(): array
    {
        return $this->invoices;
    }
}