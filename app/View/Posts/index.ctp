<div class="">
	<div class="flex my-3">
		<?php echo $this->Html->link('Add Post', array( 'controller' => 'Posts','action' => 'add' ), array('class' => 'px-6 py-4 bg-red-500 text-white rounded')  ); ?>
	</div>
	<div class="post-content align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
		<table class="min-w-full">
			<tr>
				<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Id</th>
				<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Title</th>
				<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Edit</th>
				<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Delete</th>
				<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Created</th>
			</tr>

			<!-- Here is where we loop through our $posts array, printing out post info -->

			<tbody class="bg-white">
			<?php foreach ($posts as $post): ?>
				<tr>
					<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo $post['Post']['id']; ?></td>
					<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
						<?php echo $this->Html->link($post['Post']['title'],
								array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
					</td>
					<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
						<?php echo $this->Html->link("Edit ". $post['Post']['title'],
								array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'])); ?>
					</td>
					<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
						<?php echo $this->Form->postLink("Delete ". $post['Post']['title'],
								array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']),
								array('confirm' => 'Are You Sure?')
						); ?>
					</td>
					<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo $post['Post']['created']; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			<?php unset($post); ?>
		</table>
	</div>
</div>
