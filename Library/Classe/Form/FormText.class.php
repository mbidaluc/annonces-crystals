<?php
/**
 * Description of FormText
 *
 * @author FFOZEU
 */
namespace Library\Classe\Form;

class FormText extends FormInput {

	protected $autocomplete;

	public function __construct($name, $form) {

		parent::__construct($name, $form);
		$this->attrs['type'] = 'text';
		$this->autocomplete = true;
	}

	public function autocomplete($bool) {

		if (false === $bool) { $this->attrs['autocomplete'] = 'off'; $this->autocomplete = false; }
		else { unset($this->attrs['autocomplete']); $this->autocomplete = true; }
		return $this;

	}

	public function get_cleaned_value($value) {

		return parent::get_cleaned_value(preg_replace('`[\x00-\x19]`i', '', $value));
	}

	public function __toString() {

		$tab = func_num_args() > 0 ? func_get_arg(0) : '';
		
		$this->_generate_class();

		$id = '';
		$label = '';
		if (!empty($this->label)) {

			list($for, $id) = self::_generate_for_id($this->form->auto_id(), $this->attrs['name']);
			$label = '<label'.$for.'>'.$this->label.$this->form->label_suffix().'</label>'.((isset($this->attrs['required'])&&$this->attrs['required'])?'<span class="required">*</span>':'<span class="no_required">&nbsp;&nbsp;</span>')."\n$tab";
		}

		$errors = $this->error_messages->__toString($tab);
		if (!empty($errors)) { $errors = "\n".$errors; }

		if (true === $this->autocomplete) {

			$value = $this->form->get_bounded_data($this->attrs['name']);
			$value = (!empty($value)) ? $value : $this->value;
			$value = (!empty($value)) ? ' value="'.htmlspecialchars($value).'"' : '';

		} else {

			$value = '';
		}

		$field = '<input'.$id.$this->attrs.$value.' />';
		return $tab.sprintf("%2\$s%1\$s%3\$s", $field, $label, $errors);
	}
}

?>
