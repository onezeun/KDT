$(document).ready(function () {
  /* 달력 */

  /* 날짜 선택 */
  // $('#daterange').on('apply.daterangepicker', function (ev, picker) {
  //   console.log(picker.startDate.format('YYYY-MM-DD'));
  //   console.log(picker.endDate.format('YYYY-MM-DD'));
  // });

  $('#daterange').daterangepicker({
    autoUpdateInput: false,
    locale: {
      cancelLabel: 'Clear',
      format: 'YYYY-MM-DD',
      separator: ' - ',
      applyLabel: '확인',
      cancelLabel: '취소',
      fromLabel: 'From',
      toLabel: 'To',
      customRangeLabel: 'Custom',
      weekLabel: 'W',
      daysOfWeek: ['월', '화', '수', '목', '금', '토', '일'],
      monthNames: [
        '1월',
        '2월',
        '3월',
        '4월',
        '5월',
        '6월',
        '7월',
        '8월',
        '9월',
        '10월',
        '11월',
        '12월',
      ],
    },
    applyButtonClasses: 'datepicker_apply_btn',
    cancelClass: 'datepicker_cancel_btn',
  });

  $('#daterange').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(
      picker.startDate.format('YYYY-MM-DD') +
        ' - ' +
        picker.endDate.format('YYYY-MM-DD'),
    );
  });

  /* 메인 배너 슬라이드 */
  $('.mb_reco_slide').on('init', function (event, slick) {
    $('#now_page').text(1);
    $('#total_page').text(slick.slideCount);
  });

  $('.mb_reco_slide').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    arrows: true,
    prevArrow: $('.carousel_prev'),
    nextArrow: $('.carousel_next'),
  });

  $('.mb_reco_slide').on(
    'afterChange',
    function (event, slick, currentSlide, nextSlide) {
      var i = (currentSlide ? currentSlide : 0) + 1;
      $('#now_page').text(i);
      $('#total_page').text(slick.slideCount);
    },
  );

  $('.carousel_play').click(function (e) {
    e.preventDefault(); // 클릭 시 맨 위로 가지 않게
    $('.mb_reco_slide').slick('slickPlay');
    $('.carousel_stop').show();
    $('.carousel_play').hide();
  });

  $('.carousel_stop').click(function (e) {
    e.preventDefault();
    $('.mb_reco_slide').slick('slickPause');
    $('.carousel_play').show();
    $('.carousel_stop').hide();
  });

  /* 중간 배너 슬라이드 */
  $('.sale_slide').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
  });

  /* 이벤트 배너 슬라이드  */
  $('.evnt_slide').on('init', function (event, slick) {
    $('#evnt_now_page').text(1);
    $('#evnt_total_page').text(slick.slideCount);
  });

  $('.evnt_slide').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    arrows: true,
    prevArrow: $('.evnt_prev'),
    nextArrow: $('.evnt_next'),
  });

  $('.evnt_slide').on(
    'afterChange',
    function (event, slick, currentSlide, nextSlide) {
      var i = (currentSlide ? currentSlide : 0) + 1;
      $('#evnt_now_page').text(i);
      $('#evnt_total_page').text(slick.slideCount);
    },
  );

  $('.evnt_play').click(function (e) {
    e.preventDefault();
    $('.evnt_slide').slick('slickPlay');
    $('.evnt_stop').show();
    $('.evnt_play').hide();
  });

  $('.evnt_stop').click(function (e) {
    e.preventDefault();
    $('.evnt_slide').slick('slickPause');
    $('.evnt_play').show();
    $('.evnt_stop').hide();
  });

  /* 메인 카드 슬라이드*/
  $('#room_slide').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    variableWidth: true,
    prevArrow: $('#room_btn1'),
    nextArrow: $('#room_btn2'),
  });

  $('#tour_slide').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    variableWidth: true,
    arrows: true,
    prevArrow: $('#tour_btn1'),
    nextArrow: $('#tour_btn2'),
  });

  $('#info_slide').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    variableWidth: true,
    prevArrow: $('#info_btn1'),
    nextArrow: $('#info_btn2'),
  });
});
