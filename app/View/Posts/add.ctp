<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array( 'class' => 'mb-4 px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full' ));
echo $this->Form->input('body', array('rows' => '3','class' => 'px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full'));

echo $this->Html->div('captcha', captcha_image_html(), false);
echo $this->Form->input('CaptchaCode', array(
	'label' => 'Retype the characters from the picture:',
	'maxlength' => '10',
	'div' => array(
		'class' => 'my-16'
	),
	'class' => 'px-3 py-3 placeholder-gray-400 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-16',
));

$this->Form->unlockField('BDC_UserSpecifiedCaptchaId');
$this->Form->unlockField('BDC_VCID_ExampleCaptcha');
$this->Form->unlockField('BDC_BackWorkaround_ExampleCaptcha');
$this->Form->unlockField('BDC_Hs_ExampleCaptcha');
$this->Form->unlockField('BDC_SP_ExampleCaptcha');

$options = array(
		'label' => "Submit",
		'class' => 'bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 cursor-pointer',
		'div' => array(
				'class' => 'my-4'
)
);
echo $this->Form->end($options);
?>
