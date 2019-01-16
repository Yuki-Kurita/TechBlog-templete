[].slice.call(document.querySelectorAll('.dropdown .nav-link')).forEach(function(el){
    el.addEventListener('click', onClick, false);
});

function onClick(e){
    e.preventDefault();
    var el = this.parentNode;
    el.classList.contains('show-submenu') ? hideSubMenu(el) : showSubMenu(el);
}

function showSubMenu(el){
    el.classList.add('show-submenu');
    document.addEventListener('click', function onDocClick(e){
        e.preventDefault();
        if(el.contains(e.target)){
            return;
        }
        document.removeEventListener('click', onDocClick);
        hideSubMenu(el);
    });
}

function hideSubMenu(el){
    el.classList.remove('show-submenu');
}
// 記事のタイトルを取得、view.phpにajaxで送る
function getPostId(){
  var title = document.getElementById('post-id').innerHTML;
  var $json_title = {"title":title};
  console.log($json_title);
  $.ajax({
    type: 'POST',
    url: './view.php',
    data: $json_title,
})
}

function getValue(obj){
  id = obj.getAttribute('value');
  var json_id = {"id2":id};
  $.ajax({
    type: 'POST',
    url: 'view.php',
    data: json_id,
    success: function(html){
        alert(html);
    }
    });

    var value = "例えば";
$.ajax({
    type: "POST",
    url: "/test.php",
    data: {"item": value},
        success: function(html){
            alert(html);
        }
    });
}
