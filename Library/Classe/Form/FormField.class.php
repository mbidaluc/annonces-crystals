<?php

/**
 * Description of Form_field
 *
 * @author FFOZEU
 */
namespace Library\Classe\Form;

abstract class FormField {

	protected $form;
	protected $required;
	protected $label;
	protected $value;
	protected $class;
	protected $attrs;
	protected $error_messages;
	protected $custom_error_messages;

	protected static $error_list = array();

	public function __construct($name, $form) {

		$this->form     = $form;
		$this->required = true;
		$this->label    = '';
		$this->value    = '';
		$this->class    = array();
		$this->attrs    = new AttributeList;
		$this->attrs['name'] = $name;
		$this->error_messages= new ErrorList;
		$this->custom_error_messages = array();

		$this->_init();
	}

	protected function _init() {

		if (!isset(self::$error_list['required'])) {

			self::$error_list['required'] = 'Ce champ est obligatoire.';
		}
		if (!isset(self::$error_list['maxlength'])) {

			self::$error_list['maxlength'] = 'La longueur maximale est de %d caractères.';
		}
	}

	public function is_valid($value) {

		$value = $this->get_cleaned_value($value);

		$valid = true;

		if ($this->required && $value == '') {

			$this->_error('required');
			$valid = false;
		}

		if (isset($this->attrs['maxlength'])) {

			if (isset($value[$this->attrs['maxlength']])) {

				$this->_error('maxlength');
				$valid = false;
			}
		}

		return $valid;
	}

	public function label($text) {

		$this->label = $text;
		return $this;
	}

	public function value($text) {

		$this->value = $text;
		return $this;
	}

	public function add_class($class) {

		if (!in_array($class, $this->class)) { $this->class[] = $class; }
		return $this;
	}

	public function required($bool = true) {

		if (true === $bool) { $this->attrs['required'] = 'required'; $this->required = true; }
		else { unset($this->attrs['required']); $this->required = false; }
		return $this;
	}

	public function disabled($bool = true) {

		if (true === $bool) { $this->attrs['disabled'] = 'disabled'; }
		else { unset($this->attrs['disabled']); }
		return $this;
	}

	public function readonly($bool = true) {

		if (true === $bool) { $this->attrs['readonly'] = 'readonly'; }
		else { unset($this->attrs['readonly']); }
		return $this;
	}

	public function maxlength($value) {

		if (ctype_digit((string)$value) && $value > 0) { $this->attrs['maxlength'] = $value; }
		else { unset($this->attrs['maxlength']); }
		return $this;
	}

	public function errors() {

		return $this->error_messages;
	}

	public function get_name() {

		return $this->attrs['name'];
	}

	public function get_cleaned_value($value) {

		return $value;
	}

	public function get_value() {

		return isset($this->attrs['value']) ? $this->attrs['value'] : '';
	}

	public function custom_error_message($id_error, $message) {

		if (!isset(self::$error_list[$id_error])) {

			trigger_error("Le message d'erreur identifié par '$id_error' ne s'applique pas à la classe ".get_class($this).".");

		} else {

			$this->custom_error_messages[$id_error] = $message;
		}
		return $this;
	}

	protected function _error($id_error) {

		$error = $this->_get_error_message($id_error);

		if ('maxlength' == $id_error) {

			$this->error_messages[$id_error] = vsprintf($error, $this->attrs['maxlength']);

		} else if (!$this->_custom_errors($id_error, $error)) {

			$this->error_messages[$id_error] = $error;
		}
	}

	protected function _custom_errors($id_error, $error) {

		return false;
	}

	abstract public function __toString();

	static protected function _generate_for_id($auto_id, $name) {

		if (!empty($auto_id)) {

			$for = sprintf(' for="'.$auto_id.'"', $name);
			$id  = sprintf(' id="'.$auto_id.'"',  $name);
			return array($for, $id);
		}
		return array('', '');
	}

	protected function _generate_class() {

		if (!empty($this->class)) {

			$this->attrs['class'] = implode(' ', $this->class);
		}
	}

	protected function _get_error_message($id_error) {

		if (isset($this->custom_error_messages[$id_error])) {

			return $this->custom_error_messages[$id_error];

		} else if (isset(self::$error_list[$id_error])) {

			return self::$error_list[$id_error];
		}
		return 'Erreur inconnue : "'.$id_error.'"';
	}
    
    public function add_br_tag($param = false){
        return $param;
    }
}

?>