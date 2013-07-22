<?php

/**
 * 
 * up - A simple upload file safely class 
 *
 * @author		Author: hasan movahed  . ( website : wallfa.com )  love google search hasan movahed . 
 * @git 		https://github.com/wallfa/upload
 * @version     0.1
 * 
 */
  
class upload
		{
		    var $format; //varible for type file
		    var $size; // varible for size file 
		    var $dir; // varible for directory 
		    var $path = 'upload/%year%/%month%/%day%';// %year% for year, %month% for month, %day% for day, or just write exact path.
		    var $path_right = '0777'; //int mod or permision

            /**
             * @param $format all type allowed upload 
             * @param $dir directory upload file 
             */ 
		    public function __construct($format, $dir)
		    {
		        $this->dir = $dir;
		        $this->format = $format;
		    }

		    /**
		     * comparing mime type with type file 
		     * 
		     * @param $file is file send from
		     * 
	         */
		    public function mime($file)
		    {
		        if(array_key_exists($file['type'],$this->format)){
		          return $file ;
		        }else return false; 

		    }

		    /**
		     * comparing size value with size file 
		     * 
		     * @param $file is file send from
		     * 
		     */
		    public function size($file)
		    {
		        if($file == false ){
		          return false;
		        }
		        elseif ($file['size'] <= $this->format[$file['type']] )
		        {
		            return $file;
		        } else return false;
		    }

		    /**
		     * chek exist folder
		     * 
		     * @param $path is new folder create class
		     * 
		     */
		    public function exfolder()
		    {
		        if (is_dir($this->path))
		        {
		            return true;
		        }
		    }

		    /**
		     * comparing mime type with type file 
		     * 
		     * @param $file is file send from
		     * 
		     */
		    public function exfile($name)
		    {
		        if (file_exists($name))
		        {
		            return true;
		        }else
		        {
		            return $name; 
		        }
		    }

		    /**
		     * comparing mime type with type file 
		     * 
		     * @param $file is file send from
		     * 
		     */
		    public function newfolder()
		    {
		        if (!@mkdir($this->path, $this->path_right, true))
		        {
		            echo  "can not create a folder";
		        } else
		        {
		            return true;
		        }
		    }
            
            /**
             * new path dir 
             * 
             * @param no param
             */ 
		    public function path()
		    {
		        $path_keys = array(
		            '%year%',
		            '%month%',
		            '%day%');
		        $replace_keys = array(
		            date("Y"),
		            date("m"),
		            date("d"));
		        for ($i = 0; $i <= 2; $i++)
		        {
		            $this->path = str_replace($path_keys[$i], $replace_keys[$i], $this->path);
		        }
		    }
            
		    /**
		     * create new name for file  
		     * 
		     * @param $ext format this file 
		     * 
		     */
		    public function rename($ext)
		    {
		        $name = rand() . "-" . time() . "." . $ext;
		        return $name;
		    }


		    /**
		     * object for upload file  
		     * 
		     * @param $file is file send from
		     * 
		     */
            public function uploadfile($file)
		    {
               $file = $this->size( $this->mime($file) );
               
               if ($file == false ){
                  echo 'error1';
               }else{
                
                  $filename = basename($file['name']);
		          $ext = substr($filename, strrpos($filename, '.') + 1);
                  
                  $this->path();
                  
                  
                  //if the folder is not found
                  if( $this->exfolder($this->path) == false ){
                       $umask = umask(0);
                         $this->newfolder();
                         if (!@move_uploaded_file($file['tmp_name'], $this->path . '/' . $filename))
		                 {
		                   echo "can not upload file";
		                 }
                       umask($umask); 
                  }
                  //if the file is not found and folder exist 
                  elseif ($this->exfolder($this->path) == true && $this->exfile($this->path.$file['name']) != true ){
                    
                       $umask = umask(0);
                       if (!@move_uploaded_file($file['tmp_name'], $this->path . '/' . $filename))
		                 {
		                   echo "can not upload file";
		                 }
                       umask($umask);                           
                    
                    
                  }
                  //if the file and folder exist  
                  elseif( $this->exfolder($this->path) == true && $this->exfile($this->path.$file['name']) == true ){
                     
                       $filename = $this->rename($ext); 
                       $umask = umask(0);
                       if (!@move_uploaded_file($file['tmp_name'], $this->path . '/' . $filename))
		                 {
		                   echo "can not upload file";
		                 }
                       umask($umask);
                                         
                  }
                  //not
                  else{
                       echo 'oooooooooooooooooooooooooooooooooooooooooooooooof love php';
                  }
               }
		    }

		}

?>