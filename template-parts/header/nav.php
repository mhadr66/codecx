<?php
/**
 * Header Navigation template.
 * 
 * @package Codecx
 */

$menu_class = \CODECX_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'codecx-header-menu' );

$header_menus = wp_get_nav_menu_items( $header_menu_id );
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container">
    <?php
      if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
      }
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
      if ( ! empty( $header_menus ) && is_array( $header_menus ) ) {
        ?>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php
          foreach ( $header_menus as $menu_item ) {
            if ( ! $menu_item->menu_item_parent ) {

              $child_menu_items = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
              $has_childern = ! empty( $child_menu_items ) && is_array ( $child_menu_items );

              if ( ! $has_childern ) {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo esc_url( $menu_item->url ); ?>">
                    <?php echo esc_html( $menu_item->title ); ?>
                  </a>
                </li>
                <?php
              } else {
                ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo esc_html( $menu_item->title ); ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php
                    foreach ( $child_menu_items as $child_menu_item ) {
                      ?>
                      <a class="dropdown-item" href="<?php echo esc_url ( $child_menu_item->url ); ?>">
                        <?php echo esc_html( $child_menu_item->title ); ?>
                      </a>
                      <?php
                    }
                    ?>
                  </div>
                </li>
                <?php
              }
              ?>


              <?php
            }
          }
        ?>
      </ul>
        <?php
      }

      ?>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>