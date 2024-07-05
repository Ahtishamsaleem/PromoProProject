<?php

namespace App\Imports\Contract;

use App\Models\Contract;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class ContractUploadImport implements ToModel, WithValidation, WithHeadingRow
{
    public function model(array $row)
    {
        $mappedData = $this->mapCsvHeadersToDbColumns($row);
        return new Contract([
            'customer_id' => $mappedData ['customer_id'],
            'contract_name' => $mappedData ['contract_name'],
            'uploaded_on' => $this->parseDate($mappedData ['uploaded_on']),
            'uploaded_by' => $mappedData ['uploaded_by'],
            'contract_details' => $mappedData ['contract_details'],
            'start_date' => $this->parseDate($mappedData ['start_date']),
            'end_date' => $this->parseDate($mappedData ['end_date']),
        ]);
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['required'],
            'contract_name' => ['required', 'string', 'max:255'],
            'uploaded_on' => ['required'],
            'uploaded_by' => ['required', 'string', 'max:255'],
            'contract_details' => ['required', 'string', 'max:255'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ];
    }

    protected function parseDate($value)
    {
        // Attempt to parse date in format without leading zeros
        $date = \DateTime::createFromFormat('n/j/Y', $value);
        
        // If failed, attempt to parse with leading zeros
        if (!$date) {
            $date = \DateTime::createFromFormat('m/d/Y', $value);
        }

        // Return formatted date or null if parsing failed
        return $date ? $date->format('m/d/Y') : null;
    }
    private function mapCsvHeadersToDbColumns($row)
    {
        return [
            'customer_id' => $row['customer_id'], // Ensure 'Customer Id' matches exactly with the CSV header
            'contract_name' => $row['contract_name'],
            'uploaded_on' => $row['uploaded_on'],
            'uploaded_by' => $row['uploaded_by'],
            'contract_details' => $row['contract_details'],
            'start_date' => $row['start_date'],
            'end_date' => $row['end_date'],
        ];
    }
}
