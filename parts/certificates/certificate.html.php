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
<p><small>
  TAKENODE CERTIFICATE ID:<br>
  <?= htmlspecialchars($certificate->id) ?>
</small></p>
<h6>1. Information about the file</h6>
<p><small>
  Filename:<br>
  <?= htmlspecialchars($certificate->filename) ?>
</small></p>
<p><small>
  File type:<br>
  <?= htmlspecialchars(Helper::translate('file_type', $certificate->file_type)) ?>
</small></p>
<p><small>
  Unique file ID:<br>
  <?= htmlspecialchars($certificate->file_hash) ?>
</small></p>
<h6>2. Information about the uploader of the file</h6>
<p><small>
  <?= empty($certificate->name_verified_at) ? 'Name' : 'Full name' ?>:<br>
  <?= htmlspecialchars(Helper::translate('name', $certificate->name)) ?>
</small></p>
<?php if(!empty($certificate->name_verified_at)): ?>
<p><small>
  Full name verification:<br>
  Verified by IRMA (https://irma.app)
</small></p>
<p><small>
  Verification timestamp:<br>
  <?= htmlspecialchars($certificate->name_verified_at) ?> UNIX<br>
  <?= date('Y-m-d H:i:s e', $certificate->name_verified_at) ?>
</small></p>
<?php else: ?>
<p><small>
  Upload timestamp:<br>
  <?= htmlspecialchars($certificate->created_at) ?> UNIX<br>
  <?= date('Y-m-d H:i:s e', $certificate->created_at) ?>
</small></p>
<?php endif; ?>
<p><small>
  Contact info:<br>
  <?= htmlspecialchars(Helper::translate('contact_info', $certificate->contact_info)) ?>
</small></p>
<h6>3. Declaration of intention</h6>
<p><small>
  This <?= htmlspecialchars(strtolower(Helper::translate('file_type', $certificate->file_type))) ?> is copyright protected and I own all related rights.
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
</small></p>
<p><small>
  More information about TakeNode Certificates? Check https://takenode.org<br>
</small></p>
<?php endif; ?>
