var nav_status = false;
var nav = $('.nav-menu-movil-partial-ac8f67');
var sub_menu_contain = $('.nav-menu-movil-partial-ac8f67 .submenu');
var menu = $('.nav-menu-movil-partial-ac8f67 .submenu-content');
$(()=>{
  if($(window).width() < 991){
    $('.bar-menu').on('click', function(){
      openNav();
    });
    // Get submenu
    nav.on('click', '.get-sub-menu', function(){
      var submenu = $(this).attr('data-target');
      sub_menu_contain.addClass('active');
      getSubmenu(submenu);
    });
    $('.close-submenu').on('click', function(){
      sub_menu_contain.removeClass('active');
    });
  }
});
function openNav(){
  if(nav_status == false){
    $('.bar-menu').addClass('active');
    nav.addClass('active');
    sub_menu_contain.removeClass('active');
    nav_status = true;
  }else{
    $('.bar-menu').removeClass('active');
    nav.removeClass('active');
    nav_status = false;
  }
}
// Get submenu
function getSubmenu(submenu){
  var url = _dittoURL_ + '/wp-json/nav/movil';
  $.ajax({
    url: url,
    method: 'GET',
    data: {
      menu: submenu
    }
  }).done(function(res){
    menu.html(``);
    for(var i = 0; i < res[0].sub_menu.length; i++){
      e = res[0].sub_menu;
      var li = e[i].nav;
      menu.append(`
        ${(typeof e[i].icon === 'string' && e[i].icon.trim() !== '') ? `
        <p class="label">
          ${e[i].icon}
          ${e[i].name}
        </p>
        ` : ''}
        <nav class="nav-submenu">
          <ul class="submenu-list" id="item-${i}"></ul>
        </nav>
      `);
      printItems(li, i);
    }
  })
}
function printItems(li, i){
  for(var a = 0; a < li.length; a++){
    var item = li[a];
    var ul = '#item-'+i;
    $(ul).append(`
      <li>
        <a href="${item.url}" target="${item.target ?? '_self'}">${item.text}</a>
      </li>
    `);
  }
}