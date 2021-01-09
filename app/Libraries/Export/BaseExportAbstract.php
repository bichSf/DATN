<?php

namespace App\Libraries\Export;

abstract class BaseExportAbstract
{
    /**
     * BaseExportAbstract constructor.
     */
    public function __construct()
    {
        $this->setName();
        $this->setExtension();
    }
    /**
     * Variable file name
     *
     * @var string $fileName file name csv
     */
    protected $fileName;

    /**
     * Variable extension
     *
     * @var string $extension file extension
     */
    protected $extension;

    /**
     * BaseExportAbstract constructor.
     */

    /**
     * Set file name
     *
     * @return mixed
     */
    abstract protected function setName();

    /**
     * Set extension file
     *
     * @return mixed
     */
    abstract protected function setExtension();

    /**
     * Get file name full
     *
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName . $this->extension;
    }
}
