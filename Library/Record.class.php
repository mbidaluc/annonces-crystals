<?php
namespace Library;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Record
 *
 * @author FFOZEU
 */
abstract class Record implements \ArrayAccess{
    
    protected $erreurs = array();
    protected $id;
    public $tabAttrib = array();
    protected $tabType = array('name'=>'is_numeric','name_2'=>'html');

    public function __construct(array $donnees = array()){
        if (!empty($donnees)){
            $this->hydrate($donnees);
        }
    }
    
    public function isNew(){
        return empty($this->id);
    }
    
    public function erreurs(){
        return $this->erreurs;
    }
    
    public function id(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = (int) $id;
    }
    
    public function hydrate(array $donnees){
        $tools = new Tools();
        foreach ($donnees as $attribut => $valeur){
            $methode = 'set'.ucfirst($attribut);
            if (is_callable(array($this, $methode))){
                $html = (array_key_exists($attribut,$this->tabType)&& $this->tabType[$attribut]=='html')?true:false;
                $this->$methode($this->escape($valeur, $tools,$html));
                $this->tabAttrib[$attribut] = $valeur;
            }
        }
    }
    
    public function offsetGet($var){
        if (isset($this->$var) && is_callable(array($this, $var))){
            return $this->$var();
        }
    }
    
    public function offsetSet($var, $value){
        $method = 'set'.ucfirst($var);
        if (isset($this->$var) && is_callable(array($this, $method))){
            $this->$method($value);
        }
    }
    
    public function offsetExists($var){
        return isset($this->$var) && is_callable(array($this,$var));
    }
    /**
     *  suppression d'une ligne non existante
     * @param type $var
     * @throws \Exception
     */
    public function offsetUnset($var){

        throw new \Exception('Impossible de supprimer une quelconque valeur');
    }
    /**
     * set content attrib who not exist
     * @param type $key
     * @param type $value
     */
    public function __set($key,$value){
        if (!is_array($value))
            $this->tabAttrib[(string)$key] = (string)$value;
    }
    /**
     * get content attrib who not exit
     * @param type $key
     * @return type
     */
    public function __get($key){
        return isset($this->tabAttrib[$key]) ? $this->tabAttrib[$key] : false;
    }
    /**
     * 
     * @param type $string
     * @param type $html_ok
     * @return type
     */
    public function escape($string, $tools, $html = false)
	{
		if (_MAGIC_QUOTES_GPC_)
			$string = stripslashes($string);
		if (!is_numeric($string))
		{
			if (!$html){
                $string = $this->_escape($string);
				$string = strip_tags($tools->nl2br($string));
            }
		}

		return $string;
	}
    /**
     * escape string before sql
     * @param type $str
     * @return type
     */
    private function _escape($str)
	{
		$search = array("\\", "\0", "\n", "\r", "\x1a", "'", '"');
		$replace = array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"');		
		return str_replace($search, $replace, $str);
	}
}

?>
