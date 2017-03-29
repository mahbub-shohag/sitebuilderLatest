<?php
//echo '<pre>';
//print_r($sites);
//echo 'Hello';
?>
<div>
    <table id="siteList" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Site Url</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Website Caption</th>
            </tr>
        </thead>
        <tfoot>

        </tfoot>
        <tbody>
            <?php foreach ($sites as $asite): ?>
            <tr>
                <td><a href="<?php echo base_url().'index.php/Site_Admin/browse_school?id='.$asite['id']?>"><?php echo $asite['domain'].$asite['domain_type']; ?></a></td>
                <td><?php echo $asite['subcategory']; ?></td>
                <td><?php echo $asite['category']; ?></td>
                <td><?php echo $asite['website_caption']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
$('#siteList').DataTable( {
    keys: true
} );
</script>
    