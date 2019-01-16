$(function() {
    // show popupボタンクリック時の処理
    $('#show').click(function(e) {
        $('#popup, #layer').show();
    });
    // レイヤー/ポップアップのcloseボタンクリック時の処理
    $('#close, #layer').click(function(e) {
        $('#popup, #layer').hide();
    });
});
