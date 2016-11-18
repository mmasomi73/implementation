<?php
namespace App\FileManager;


class FileManager
{
    //TODO:: optimize code
    protected static $newsDirectory = 'uploads/';//For Product Files Directory

    public function __construct()
    {

    }


    /**
     * @param $imageAddress
     * @param $mainFileName
     * @return string
     */
    public static function uploadNewsThumbnail($imageAddress,$subDirectory , $mainFileName)
    {
        $imageAddress->move(self::getRootDirectory(self::$newsDirectory.$subDirectory), $mainFileName);
        return self::$productDirectory.$subDirectory.'/'.$mainFileName;
    }

    /**
     * @param $imageAddress
     * @param $subDirectory
     * @param $mainFileName
     * @return string
     */
    public static function uploadNewsImage($imageAddress,$subDirectory , $mainFileName)
    {


        $imageAddress->move(self::getRootDirectory(self::$newsDirectory.$subDirectory), $mainFileName);
        return self::$newsDirectory.$subDirectory.'/'.$mainFileName;
		
    }

    /**
     * @param $imageAddress
     * @return string
     */
    public static function getRootDirectory($imageAddress)
    {
        return base_path('public/' . $imageAddress);
    }


}