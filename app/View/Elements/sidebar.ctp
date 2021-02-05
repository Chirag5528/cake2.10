<ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
	<?php foreach( $routes as $route ) :  ?>
		<li class="mr-3 flex-1">
			<?= $this->Html->link(
				$this->Html->tag('i','' , array('class' => 'fas fa-tasks pr-0 md:pr-3 text-white')) .
				$this->Html->tag('span', $route , array('class' => 'pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block')),
				array( 'controller' => $route,'action' => 'index' ),
				array('escape' => false)
			); ?>
		</li>
	<?php endforeach; ?>
</ul>

