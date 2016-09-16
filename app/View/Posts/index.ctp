<h1>Blog posts</h1>
<?php echo $this->Html->link(
    '投稿を追加する',
    array('controller' => 'posts', 'action' => 'add')
); ?>
<br>
<?php echo $this->Html->link(
    'ログアウト',
    array('controller' => 'users', 'action' => 'logout')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>タイトル</th>
        <th>編集</th>
        <th>投稿日</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
                array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td>
            <?php
            echo $this->Html->link(
                'Edit',
                array('action' => 'edit', $post['Post']['id'])
            );
            ?>
            <?php
            echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?')
            );
            ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
        <?php /*$this->log(print_r($post, true), 'debug'); */?>
    </tr>
<?php endforeach; ?>
<?php unset($post); ?>
</table>