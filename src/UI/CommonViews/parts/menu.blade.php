<div class='menu_section'><h3>Main Menu</h3>
    <ul class='nav side-menu'>
        <li><a href='{{$panelURI}}'><i class='fa fa-check'></i >Dashboard</a></li>
        <li><a href='{{"$panelURI/users"}}'><i class='fa fa-check'></i >Users</a></li>
        <li><a href='{{"$panelURI/users"}}'><i class='fa fa-check'></i >Pages</a></li>
        <li><a href='{{"$panelURI/users"}}'><i class='fa fa-check'></i >Menus</a></li>
    </ul>
</div>

<?php


function createSection($name, $html = "")
{
    return "<div class='menu_section'><h3>$name</h3> $html</div>";
}

function createLink($name, $link, $icon = null)
{
    $i = ($icon) ? "<i class='$icon'></i>" : "<i class='fa fa-check'></i>";
    return "<li><a href='$link'>$i $name</a></li>";
}

function createItem($links)
{
    return "<li>$links</li>";
}

function createSubMenu($name, $icon, array $items)
{
    $it = "<li><a ><i class='{($icon) ? $icon : fa fa-check}'></i > $name </a > <ul class='nav child_menu'>";

    foreach ($items as $item) {
        $it .= $item;
    }

    return $it . "</ul></li>";

}

function createMenu($items)
{
    return "<ul class='nav side-menu'>$items</ul>";
}


$m = \Jlib\HtmlHelper\MenuMaker\ModuleLinks::getAsArray();
$men = "";

foreach ($m as $sectionName => $sections) {
    $m2 = "";
    foreach ($sections as $section) {
        if (isset($section["items"])) {
            $links = [];
            foreach ($section["items"] as $item) {
                $links[] = createItem(createLink($item["name"], $item["link"], @$item["icon"]));
            }
            $m2 .= createMenu(createSubMenu($section["name"], @$section["icon"], $links));
        } else {
            $m2 .= createMenu(createItem(createLink($section["name"], $section["link"], @$section["icon"])));
        }
    }

    $men .= createSection($sectionName, $m2);
}

?>

{!! $men !!}

