<h2>Test Suite</h2>

<div class="toolbar-placeholder">
    <div class="toolbarBox toolbarHead">
        <ul class="cc_button">
            <li>
                <a id="desc--new" class="toolbar_btn" href="{$runTestUrl}">
                    <span class="process-icon-refresh-cache" ></span>
                    <div>{l s='Run Tests'}</div>
                </a>
            </li>
        </ul>
        <div class="pageTitle">
            <h3>
                <span id="current_obj" style="font-weight: normal;">
                    <span class="breadcrumb item-0">{l s='Test Suite'}</span>
                    <img alt="&gt;" style="margin-right:5px" src="../img/admin/separator_breadcrumb.png" />
                    <span class="breadcrumb item-1">{l s='tests'}</span>
                </span>
            </h3>
        </div>
    </div>
</div>

<table class="table tableDnD" cellspacing="0" cellpadding="0" style="width:100%;">
    <thead>
    <tr class="nodrag nodrop">
        <th style="width: 5%;">{l s='Id' mod='TestSuite'}</th>
        <th style="width: 25%;">{l s='Name' mod='TestSuite'}</th>
        <th style="width: 15%;">{l s='Result' mod='TestSuite'}</th>
    </tr>
    </thead>
    <tbody>
    {assign var='i' value=0}
    {foreach from=$aListFormat item=test key=id}
        <tr class="{if $i%2 == 1}alt_row{/if} row_hover">
            <td>{$id}</td>
            <td>{$test.name}</td>
            <td>
                {$test.result}
            </td>
        </tr>
        {assign var='i' value=$i+1}
    {/foreach}
    </tbody>
</table>
{$sContent}