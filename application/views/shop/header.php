
<div id="header">
    <div id="logotop">
        <a href="<?php echo base_url();?>index.php/">
        <img src="assets/images/banner_logo_top.gif" alt="Logo" name="logo" width="53" height="118" id="logo" title="Logo" /></a>
    </div>

<?php 
  $this->load->view($this->config->item('backendpro_template_shop') . 'inc/languages');
?>
    <div id="greenbox"><!-- start of #greenbox -->
        <div class="insideright10">
            <p><span id="cart">
            <a href="<?php echo base_url();?>index.php/<?php echo $this->data['mainmodule'];?>/cart"><?php echo lang('general_shopping_cart'); ?>
            </a></span><br />
            <?php
            $handlekurv = number_format($this->data['handlekurv'] ,2,'.',',');
            if(isset($handlekurv))
            {
                echo lang('webshop_currency_symbol').$handlekurv;
            }
            else
            {
                echo lang('webshop_shoppingcart_empty');
            }
            ?>
            </p>
        </div>
    </div><!-- end of #greenbox -->
    <div id="flags"><!-- start of #flags -->
        <?php
        echo form_open($this->data['mainmodule']."/search");
        $data = array(
              "name"      => "term",
              "id"        => "term",
              "maxlength" => "64",
              "size"      => "15"
        );
        echo form_input($data);
        echo form_submit("submit",lang('webshop_search'));
        echo form_close();
        ?>
    </div><!-- end of #flags -->
    

        <?php
        if(count($this->data['mainnav']))
        {
            echo "<nav id=\"topNav\">\n";
            //echo "\n<ul id='nav'>";
            echo "<ul>\n";
            foreach ($this->data['mainnav'] as $key => $menu)
            {
                if($menu['lang_id']==$this->data['lang_id'])
                {
                    echo "\n<li class='menuone'>\n";
                    // need to find page uri from id
                    // menu /page_uri/lang_id
                    echo anchor ($this->data['mainmodule']."/pages/".$menu['id'], $menu['name']);
                    if (count($menu['children']))
                    {
                        echo "\n<ul>";
                        foreach ($menu['children'] as $subkey => $submenu)
                        {
                            echo "\n<li class='menutwo'>\n";
                            echo anchor($this->data['mainmodule']."/pages/".$submenu['id'],$submenu['name']);
                            if (count($submenu['children']))
                            {
                                echo "\n<ul>";
                                foreach ($submenu['children'] as $subkey => $subsubname)
                                {
                                    echo "\n<li class='menuthree'>\n";
                                    echo anchor($this->data['mainmodule']."/cat/",$subsubname['name']);
                                    echo "\n</li>";
                                }
                                echo "\n</ul>";
                            }
                            echo "\n</li>";
                        }
                        echo "\n</ul>";
                    }
                    echo "\n</li>\n";
                }
            }
            echo "\n</ul>\n";
            echo "</nav>\n";
        }
        ?>
		
        <div class="cb">&nbsp;</div>
</div><!-- End of div header-->



<?php
$base=$this->config->item('base_url');
$mystring = $base;
$findme   = 'localhost';
$pos = strpos($mystring, $findme);
if(ENVIRONMENT=='development' OR $pos)
{
  echo "<pre>";
  foreach ($this->data['alllangs'] as $key=>$value)
  {
    print_r($value['langname']);
  }
  echo "</pre>";
}
?>
