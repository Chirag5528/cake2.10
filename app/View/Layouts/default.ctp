<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php
		echo $this->Html->charset();
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
	?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="Chirag Arora">
	<meta name="description" content="A cake php project completely made for learning cakephp 2">
	<meta name="keywords" content="Cakephp, Php, Tailwind, HTML, CSS, Javascript">
	<?php echo $this->Html->css(captcha_layout_stylesheet_url(), array('inline' => false)) ?>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created-->
	<style>
		.captcha .BDC_CaptchaIconsDiv{
			display:flex;
			justify-content: space-between;
			width:100px !important;
		}
	</style>
</head>


<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

<!--Nav-->
<nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

	<div class="flex flex-wrap items-center">
		<div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
			<a href="#">
				<span class="text-xl pl-2"><i class="em em-grinning"></i></span>
			</a>
		</div>

		<div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <span class="relative w-full">
                    <input type="search" placeholder="Search" class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
                    <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                        <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        </svg>
                    </div>
                </span>
		</div>

		<div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
			<ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
				<li class="flex-1 md:flex-none md:mr-3">
					<a class="inline-block py-2 px-4 text-white no-underline" href="#">Active</a>
				</li>
				<li class="flex-1 md:flex-none md:mr-3">
					<a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">link</a>
				</li>
				<li class="flex-1 md:flex-none md:mr-3">
					<div class="relative inline-block">
						<button onclick="toggleDD('myDropdown')" class="drop-button text-white focus:outline-none"> <span class="pr-2"><i class="em em-robot_face"></i></span> Hi, User <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
								<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button>
						<div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
							<input type="text" class="drop-search p-2 text-gray-600" placeholder="Search.." id="myInput" onkeyup="filterDD('myDropdown','myInput')">
							<a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
							<a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-cog fa-fw"></i> Settings</a>
							<div class="border border-gray-800"></div>
							<a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>


<div class="flex flex-col md:flex-row mt-8">

	<div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-52">

		<div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-4 content-center md:content-start text-left justify-between">
			<div class="title text-2xl text-white px-2"><?php echo $this->fetch('title'); ?></div>
			<?= $this->element('Sidebar/sidebar', array(
					"routes" => array('Posts','Users')),
					array('cache' => array( 'config' => 'short' ))); ?>
		</div>


	</div>

	<div class="main-content w-full bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

		<div class="bg-gray-800 pt-3">
			<div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
				<h3 class="font-bold pl-2"><?php echo $this->fetch('title'); ?></h3>
			</div>
		</div>

		<div class="content p-10 w-full">
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</div>

</body>

</html>


	<?php echo $this->element('sql_dump'); ?>
	<?= $this->fetch('script');?>

