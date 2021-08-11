<?php

namespace Smartmage\Adminmenu\Model\Config\Backend;

<<<<<<< HEAD
class Image extends \Magento\Config\Model\Config\Backend\Image
=======
class Image extends \Magento\Config\Model\Config\Backend\File
>>>>>>> 89c9147f7c369696c774a9dbb9a23a4d8e06c8d9
{
    /**
     * The tail part of directory path for uploading
     *
     */
<<<<<<< HEAD
    const UPLOAD_DIR = 'my_image_folder'; // Folder save image
=======
    const UPLOAD_DIR = 'image'; // Folder save image
>>>>>>> 89c9147f7c369696c774a9dbb9a23a4d8e06c8d9

    /**
     * Return path to directory for upload file
     *
     * @return string
     * @throw \Magento\Framework\Exception\LocalizedException
     */
    protected function _getUploadDir()
    {
        return $this->_mediaDirectory->getAbsolutePath($this->_appendScopeInfo(self::UPLOAD_DIR));
    }

    /**
     * Makes a decision about whether to add info about the scope.
     *
     * @return boolean
     */
    protected function _addWhetherScopeInfo()
    {
        return true;
    }

    /**
     * Getter for allowed extensions of uploaded files.
     *
     * @return string[]
     */
    protected function _getAllowedExtensions()
    {
        return ['jpg', 'jpeg', 'gif', 'png', 'svg'];
    }
}