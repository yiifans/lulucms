$(function () {
    var nCur = 0;
    var box = $("#photocontent");
    var obj = box.find('li');
    var objw = obj.width();
    var objl = obj.length;
    box.find('ul').width(objl * objw);
    box.find('.leftArr').click(function () {
        nCur = (objl + nCur - 1) % objl;
        box.find('ul').animate({ 'margin-left': -nCur * objw });
    });
    box.find('.rightArr').click(function () {
        nCur = (nCur + 1) % objl;
        box.find('ul').animate({ 'margin-left': -nCur * objw });
    });
});