import CryptoJS from 'crypto-js';

onmessage = function(e) {
  let sha256 = CryptoJS.algo.SHA256.create();
  let file = e.data;

  build_hash(file, 0, sha256);
}

function build_hash(file, start, sha256)
{
  const chuck_size = 5 * 1024 * 1024;

  if(start > file.size)
  {
    let result = sha256.finalize().toString();
    postMessage(result);
  }
  else
  {
    let file_reader = new FileReaderSync();
    let offset = start + chuck_size
    let slice = file.slice(start, offset);
    let chunk = file_reader.readAsArrayBuffer(slice);
    let word_array = CryptoJS.lib.WordArray.create(chunk);
    sha256 = sha256.update(word_array);
    build_hash(file, offset, sha256);
  }
}