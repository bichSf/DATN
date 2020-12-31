<?php

namespace App\Libraries\Export;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemplateCsv extends BaseExportAbstract implements FromView
{
    private $tableType;
    /**
     * Set file name
     *
     * @return mixed
     */
    public function setName()
    {
        $this->fileName = 'template_csv';
    }

    public function setTableType($tableType = INFANTS)
    {
        $this->tableType = $tableType;
    }

    /**
     * Set extension file
     *
     * @return mixed
     */
    protected function setExtension()
    {
        $this->extension = '.csv';
    }

    /**
     * Render data to view
     *
     * @return View
     */
    public function view(): View
    {
        return view('user.nutrition.template_csv')->with(['tableType' => $this->tableType]);
    }
}
