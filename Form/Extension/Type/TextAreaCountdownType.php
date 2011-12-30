<?php
namespace BSky\Bundle\TextAreaCountdownBundle\Form\Extension\Type;

use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class TextAreaCountdownType extends TextareaType {
	/**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilder $builder, array $options) {
		parent::buildForm($builder, $options);
		if (!$options['char_limit']) {
			//TODO get the field lenght from the entity field
		}
        $builder->setAttribute('char_limit', json_encode($options['char_limit']));
    }
	
	/**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form) {
        $view->set('char_limit', $form->getAttribute('char_limit'));
    }
	
	/**
     * {@inheritdoc}
     */
    public function getDefaultOptions(array $options) {
		$default_options = parent::getDefaultOptions($options);
		$default_options['char_limit'] = null;
		return $default_options;
	}
	
    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'bsky_textareacountdown';
    }
}
