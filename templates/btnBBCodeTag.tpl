<a href="{$content}" class="button btn" {if $isExternalButtonLink} class="externalURL" {if EXTERNAL_LINK_TARGET_BLANK} target="_blank" rel="noopener noreferrer {if EXTERNAL_LINK_REL_NOFOLLOW}nofollow{/if}"{/if}{/if}>
    {if $icon != none}
        <span class="icon icon16 fa-{$icon}"></span>
    {/if}
    <span>{if $title}{$title}{else}{$content}{/if}</span>
</a>

