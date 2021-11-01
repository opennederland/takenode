import $ from "jquery";
import Dropzone from 'dropzone';

export function tool() {
  Dropzone.options.myAwesomeDropzone = {
    maxFiles: 1,
    createImageThumbnails: false,
    autoProcessQueue: false,
    maxFilesize: null, // MB
    accept: function(file, done) {
      handle_file(file, done);
    }
  };

  var elements = document.getElementsByClassName("collapse");
  
  var myFunction = function() {
    $(this).closest('.accordion-item').find('.accordion-button').removeClass('disabled');
    
    if($(this).closest('.accordion-item').is(':last-child')) {
      $(this).closest('.accordion-item').next().find('.accordion-button').removeClass('disabled');
    }
  };
  
  Array.from(elements).forEach(function(element) {
    element.addEventListener('click', myFunction);
  });
  
  // Stap 1
  $( "#step1_button_next" ).on( "click", function() {  
    var theval = $(this).closest('.accordion-item').find('.form-check-input:checked').val();
    $(this).closest('.accordion-item').find('h5').text($('#registering_' + theval).html());
  });
  
  // Stap 2
  $( "input#persoonsgegevens1" ).on( "click", function() {
    $('#velden_anoniem, #velden_algemeen').removeClass('d-none');
    $('#velden_naam').addClass('d-none');

    $('#irma_button').addClass('d-none');
    $('#step2_button_next').removeClass('d-none');
  });
  
  $( "input#persoonsgegevens2" ).on( "click", function() {
    $('#velden_naam, #velden_algemeen').removeClass('d-none');
    $('#velden_anoniem').addClass('d-none');

    $('#irma_button').addClass('d-none');
    $('#step2_button_next').removeClass('d-none');
  });
  
  $( "input#persoonsgegevens3" ).on( "click", function() {
    $('#velden_algemeen').removeClass('d-none');
    $('#velden_naam, #velden_anoniem').addClass('d-none');

    $('#step2_button_next').addClass('d-none');
    $('#irma_button').removeClass('d-none');
  });

  $('input[name=name]').on('input', function() {
    if ($.trim($('input[name=name]').val()) !== '') {
      $('input[name=name]').removeClass('is-invalid');
      $('#step2_button_next').prop("disabled", false);
    } else {
      $('input[name=name]').addClass('is-invalid');
      $('#step2_button_next').prop("disabled", true);
    }
  });

  $( "input[name='persoonsgegevens']" ).on( "click", function() {
    var theval = $(this).closest('.accordion-item').find('.form-check-input:checked').val();

    $('input[name=name]').removeClass('is-invalid');

    if (theval == 'mijn' && $.trim($('input[name=name]').val()) == '') {
      $('input[name=name]').addClass('is-invalid');
      $('#step2_button_next').prop("disabled", true);
    } else {
      $('#step2_button_next').prop("disabled", false);
    }
  });

  $( "#step2_button_next" ).on( "click", function() {
    var theval = $(this).closest('.accordion-item').find('.form-check-input:checked').val();
    $(this).closest('.accordion-item').find('h5').text($('#sending_' + theval).html());
  });

  $('#irma_button').on("click", function() {
    $('form#tool_form').submit();
  });

  // Stap 3
  $( "input[name='toestemming']" ).on( "click", function() {
    $('#step3_button_next').prop("disabled", false);
  });
  
  $( "#step3_button_next" ).on( "click", function() {
    var theval = $(this).closest('.accordion-item').find('.form-check-input:checked').attr('id');
    $(this).closest('.accordion-item').find('h5').text($('#permission_' + theval).html());

    $.post('/result.php', $('form#tool_form').serialize(), function(data) {
      $('a#download_button').attr('href', '/download-certificate?id=' + data.id);
      $('a#permanent_url_link').attr('href', data.url);
      $('a#permanent_url_link').html(data.url);
      $('a#mail_url_link').attr('href', 'mailto:?subject=TakeNode%20certificate&body=' + encodeURIComponent(data.url));
      $('#generateurl').data('id', data.id);
      $('#collapseCertificate div').html(data.certificate_html);
      $('#certificate_text').html(data.certificate_text);
      $('#certificate_spinner').addClass('d-none');
      $('#result').removeClass('d-none');
    }, 'json');
  });
  
  // Stap 4
  $( "#generateurl" ).on( "click", function() {
    $.post('/publish.php', $(this).data());
    $(this).hide();
  });

  $('#copy_link_button').on('click', function() {
    navigator.clipboard.writeText($('a#permanent_url_link').html()).then(function() {
      $('#copy_link_button').html('<i class="fal fa-clipboard"></i> Copied');

      setTimeout(function() {
        $('#copy_link_button').html('<i class="fal fa-clipboard"></i> Copy URL ');
      }, 5000);
    }, function() {
      // Failed
    });
  });

  $('#copy_button').on('click', function() {
    navigator.clipboard.writeText($('#certificate_text').html()).then(function() {
      $('#copy_button').html('<i class="fal fa-clipboard"></i> Copied');

      setTimeout(function() {
        $('#copy_button').html('<i class="fal fa-clipboard"></i> Copy ');
      }, 5000);
    }, function() {
      // Failed
    });
  });
}

export function handle_file(file, done)
{
  if(file)
  {
    const worker = new Worker('/assets/js/hash-worker-min.js');

    $('#myAwesomeDropzone').addClass('d-none');
    $('#hash_spinner').removeClass('d-none');

    worker.postMessage(file);

    worker.onmessage = function(e) {
      const file_type = detect_file_type(file.type);

      $('input[name=filename]').val(file.name);
      $('input[name=hash]').val(e.data);

      if(file_type)
      {
        $('input[name=bestandstype][value=' + file_type +' ]').attr('checked', true);
      }

      done();
      $('body').addClass('show-tool');
    }
  }
}

export function detect_file_type(type)
{
  const data = {
    'audio/aac': 'geluid',
    'application/x-abiword': 'tekst',
    'video/x-msvideo': 'beeld',
    'application/vnd.amazon.ebook': 'tekst',
    'image/bmp': 'beeld',
    'application/x-cdf': 'geluid',
    'application/x-csh': 'tekst',
    'text/css': 'tekst',
    'text/csv': 'tekst',
    'application/msword': 'tekst',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document': 'tekst',
    'application/vnd.ms-fontobject': 'tekst',
    'application/epub+zip': 'tekst',
    'image/gif': 'beeld',
    'text/html': 'tekst',
    'image/vnd.microsoft.icon': 'beeld',
    'text/calendar': 'tekst',
    'application/java-archive': 'tekst',
    'image/jpeg': 'beeld',
    'text/javascript': 'tekst',
    'application/json': 'tekst',
    'application/ld+json': 'tekst',
    'audio/midi audio/x-midi': 'geluid',
    'audio/mpeg': 'geluid',
    'video/mp4': 'beeld',
    'video/mpeg': 'beeld',
    'application/vnd.oasis.opendocument.presentation': 'tekst',
    'application/vnd.oasis.opendocument.spreadsheet': 'tekst',
    'application/vnd.oasis.opendocument.text': 'tekst',
    'audio/ogg': 'geluid',
    'video/ogg': 'geluid',
    'application/ogg': 'geluid',
    'audio/opus': 'geluid',
    'font/otf': 'tekst',
    'image/png': 'beeld',
    'application/pdf': 'beeld',
    'application/x-httpd-php': 'tekst',
    'application/vnd.ms-powerpoint': 'tekst',
    'application/vnd.openxmlformats-officedocument.presentationml.presentation': 'tekst',
    'application/rtf': 'tekst',
    'application/x-sh': 'tekst',
    'image/svg+xml': 'beeld',
    'application/x-shockwave-flash': 'beeld',
    'image/tiff': 'beeld',
    'video/mp2t': 'beeld',
    'font/ttf': 'tekst',
    'text/plain': 'tekst',
    'application/vnd.visio': 'beeld',
    'audio/wav': 'geluid',
    'audio/webm': 'geluid',
    'video/webm': 'beeld',
    'image/webp': 'beeld',
    'font/woff': 'tekst',
    'font/woff2': 'tekst',
    'application/xhtml+xml': 'tekst',
    'application/vnd.ms-excel': 'tekst',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': 'tekst',
    'application/xml': 'tekst',
    'text/xml': 'tekst',
    'text/php': 'tekst',
    'application/vnd.mozilla.xul+xml': 'tekst',
    'video/3gpp': 'beeld',
    'audio/3gpp': 'geluid',
    'video/3gpp2': 'beeld',
    'audio/3gpp2': 'geluid',
    'audio/x-aiff': 'geluid'
  };

  return data.hasOwnProperty(type) ? data[type] : null;
}