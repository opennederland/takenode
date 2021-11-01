import $ from "jquery";

export function site_is_loaded() {
  $('body').addClass('loaded');
  $('.preloader-wrapper').fadeOut();
  $('.mod-foto').addClass('autoheight');
  set_background();
}

export function set_background() {
  const orientation = window.innerHeight > window.innerWidth ? 'portrait' : 'landscape';
  const number_of_available_backgrounds = 5;
  const image_number = Math.floor(Math.random() * number_of_available_backgrounds) + 1;
  const background_image_info = get_background_image_info(orientation, image_number);
  const base_url = $('#image_takenode_id').data('base_url');

  $('.backgroundimage').css('background-image', 'url(/assets/backgroundimages/' + orientation + '/' + image_number + '.jpg)');
  $('#creator_name').html(background_image_info.name);
  $('#image_takenode_id').html(background_image_info.id);
  $('#image_takenode_id').attr('href', base_url + 'certificate?id=' + background_image_info.id);
}

export function update_background() {
  const orientation = window.innerHeight > window.innerWidth ? 'portrait' : 'landscape';
  const previous_orientation = orientation == 'portrait' ? 'landscape' : 'portrait';

  const current_background = $('.backgroundimage').css('background-image');

  if (current_background == 'none') {
    set_background();
  }
  else {
    const new_background = current_background.replace(previous_orientation, orientation);

    if (current_background != new_background) {
      const base_url = $('#image_takenode_id').data('base_url');
      const image_number = new_background.match(/\d+/)[0];
      const background_image_info = get_background_image_info(orientation, image_number);
      $('.backgroundimage').css('background-image', new_background);
      $('#creator_name').html(background_image_info.name);
      $('#image_takenode_id').html(background_image_info.id);
      $('#image_takenode_id').attr('href', base_url + 'certificate?id=' + background_image_info.id);
    }
  }
}

export function get_background_image_info(orientation, image_number) {
  const data = {
    landscape1: {
      name: 'Sebastiaan ter Burg',
      id: '313343d2-6ed3-43e7-bfd1-e6d24485601c'
    },
    landscape2: {
      name: 'Sebastiaan ter Burg',
      id: 'e5f1d32e-7d4a-487d-be92-41b844a4882e'
    },
    landscape3: {
      name: 'Sebastiaan ter Burg',
      id: 'bb65426e-4147-427a-8dff-813886cc3e45'
    },
    landscape4: {
      name: 'Sebastiaan ter Burg',
      id: '78897716-7a69-45ef-985b-0ed7ead66893'
    },
    landscape5: {
      name: 'Sebastiaan ter Burg',
      id: 'c6e1b797-87b1-41e1-99d2-07f42afbb525'
    },
    portrait1: {
      name: 'Sebastiaan ter Burg',
      id: '45f62e00-50e4-48cf-bdcf-5fea532b12a9'
    },
    portrait2: {
      name: 'Sebastiaan ter Burg',
      id: 'ce10fc39-87b9-4fbe-bb7b-bf2b25480b4c'
    },
    portrait3: {
      name: 'Sebastiaan ter Burg',
      id: '45f62e00-50e4-48cf-bdcf-5fea532b12a9'
    },
    portrait4: {
      name: 'Sebastiaan ter Burg',
      id: 'ce10fc39-87b9-4fbe-bb7b-bf2b25480b4c'
    },
    portrait5: {
      name: 'Sebastiaan ter Burg',
      id: '45f62e00-50e4-48cf-bdcf-5fea532b12a9'
    }
  };

  return data[orientation + image_number];
}