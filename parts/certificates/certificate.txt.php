<?php

$certificate = $db->select_query('
  SELECT *
  FROM `certificates`
  WHERE `id` = ?
  AND `deleted_at` IS NULL
  AND (
    `is_published` = 1
    OR `created_at` > ?
  )
', [
  $id,
  time() - (3600 * 24)
], FALSE);

?>
<?php if(!empty($certificate)): ?>
TAKENODE CERTIFICATE ID:
<?= htmlspecialchars($certificate->id).PHP_EOL ?>

1. Information about the file

Filename:
<?= htmlspecialchars($certificate->filename).PHP_EOL ?>

File type:
<?= htmlspecialchars(Helper::translate('file_type', $certificate->file_type)).PHP_EOL ?>

Unique file ID:
<?= htmlspecialchars($certificate->file_hash).PHP_EOL ?>

2. Information about the uploader of the file

<?= empty($certificate->name_verified_at) ? 'Name' : 'Full name' ?>:
<?= htmlspecialchars(Helper::translate('name', $certificate->name)).PHP_EOL ?>
<?php if(!empty($certificate->name_verified_at)): ?>

Full name verification:
Verified by IRMA (https://irma.app)

Verification timestamp:
<?= htmlspecialchars($certificate->name_verified_at) ?> UNIX
<?= date('Y-m-d H:i:s e', $certificate->name_verified_at).PHP_EOL ?>
<?php else: ?>

Upload timestamp:
<?= htmlspecialchars($certificate->created_at) ?> UNIX
<?= date('Y-m-d H:i:s e', $certificate->created_at).PHP_EOL ?>
<?php endif; ?>

Contact info:
<?= htmlspecialchars(Helper::translate('contact_info', $certificate->contact_info)).PHP_EOL ?>

3. Declaration of intention

<?= 'This '.htmlspecialchars(strtolower(Helper::translate('file_type', $certificate->file_type))).' is copyright protected and I own all related rights. ' ?>
<?php if($certificate->permission == 'Mijn werk mag worden gedeeld'): ?>
You can freely share this work for non-commercial purposes. When in doubt, please contact me first. And please credit me as the owner of this work.
<?php elseif($certificate->permission == 'Mijn werk mag worden gedeeld en bewerkt'): ?>
You can freely adapt and/or share this work for non-commercial purposes. When in doubt, please contact me first. And please credit me as the owner of this work.
<?php elseif($certificate->permission == 'Mijn werk mag worden gedeeld en commercieel worden gebruikt'): ?>
You can freely share this work even for commercial purposes. Make sure to credit me as the owner of this work.
<?php elseif($certificate->permission == 'Mijn werk mag worden gedeeld, bewerkt en commercieel worden gebruikt'): ?>
You can freely adapt, share and build upon this work even for commercial purposes. Make sure to credit me as the owner of this work.
<?php elseif($certificate->permission == 'Mijn werk mag niet worden gebruikt zonder mijn schriftelijke toestemming'): ?>
Without my written consent you are not allowed to adapt, share or build upon my work. So please contact me if you are interested in using or sharing my work.
<?php endif; ?>

------------------------------------------------------------------------
More information about TakeNode Certificates? Check https://takenode.org
------------------------------------------------------------------------
<?php endif; ?>
