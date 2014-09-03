<div class="page-header">
    <h2><?= t('Last logins') ?></h2>
</div>

<?php if (empty($last_logins)): ?>
    <p class="alert"><?= t('Never connected.') ?></p>
<?php else: ?>
    <table class="table-small">
    <tr>
        <th><?= t('Login date') ?></th>
        <th><?= t('Authentication method') ?></th>
        <th><?= t('IP address') ?></th>
        <th><?= t('User agent') ?></th>
    </tr>
    <?php foreach($last_logins as $login): ?>
    <tr>
        <td><?= dt('%B %e, %Y at %k:%M %p', $login['date_creation']) ?></td>
        <td><?= Helper\escape($login['auth_type']) ?></td>
        <td><?= Helper\escape($login['ip']) ?></td>
        <td><?= Helper\escape(Helper\summary($login['user_agent'])) ?></td>
    </tr>
    <?php endforeach ?>
    </table>
<?php endif ?>