<?php
/**
 * Description of FormPassword
 *
 * @author FFOZEU
 */
namespace Library\Classe\Form;

class FormPassword extends FormText {

	public function __construct($name, $form) {

		parent::__construct($name, $form);
		$this->attrs['type'] = 'password';
	}

	public function __toString() {

		$tab = func_num_args() > 0 ? func_get_arg(0) : '';
		
		$this->_generate_class();

		$id = '';
		$label = '';
		if (!empty($this->label)) {

			list($for, $id) = self::_generate_for_id($this->form->auto_id(), $this->attrs['name']);
			$label = '<label'.$for.'>'.$this->label.$this->form->label_suffix().'</label>'."\n$tab";
		}

		$errors = $this->error_messages->__toString($tab);
		if (!empty($errors)) { $errors = "\n".$errors; }

		$field = '<input'.$id.$this->attrs.' />';
		return $tab.sprintf("%2\$s%1\$s%3\$s", $field, $label, $errors);
	}
}

?>
