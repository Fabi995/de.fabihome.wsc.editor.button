<a href="{$content}" class="button btn" {if $isExternalButtonLink} class="externalURL" {if EXTERNAL_LINK_TARGET_BLANK} target="_blank"{/if}{/if}>
    {if $icon != none}
        <span class="icon icon16 icon-{$icon}"></span>
    {/if}
    <span>{if $title}{$title}{else}{$content}{/if}</span>
</a>

