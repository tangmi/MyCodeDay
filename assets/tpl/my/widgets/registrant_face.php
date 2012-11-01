<a  class="registrant-face"
    href="<?=\CuteControllers\Router::link('/r/' . $registrant->registrantID)?>"
    data-id="<?=$registrant->registrantID?>"
    <?php if ($registrant->profile_image) : ?>
            style="background-image: url('<?=$registrant->profile_image?>');"
    <?php endif; ?>
    >
    <?=$registrant->name?>
</a>
