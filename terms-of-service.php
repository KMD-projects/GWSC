<?php

include('db/query.php');

global $connect;

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/9cfc40fa5c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
<header>
    <?php include 'navbar.php'; ?>
    <div class="page-header">
        <h1>Terms of Service</h1>
    </div>
</header>
<main class="grid-container-3">
    <div class="grid-2-3">
        <h1>Website Terms and Conditions of Use</h1>

        <h2>1. Terms</h2>

        <p>By accessing this Website, accessible from gwsc.almir.info, you are agreeing to be bound by these Website Terms
            and Conditions of Use and agree that you are responsible for the agreement with any applicable local laws. If
            you disagree with any of these terms, you are prohibited from accessing this site. The materials contained in
            this Website are protected by copyright and trade mark law.</p>

        <h2>2. Use License</h2>

        <p>Permission is granted to temporarily download one copy of the materials on Global Wild Swimming and Camping's
            Website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of
            title, and under this license you may not:</p>

        <ul>
            <li>modify or copy the materials;</li>
            <li>use the materials for any commercial purpose or for any public display;</li>
            <li>attempt to reverse engineer any software contained on Global Wild Swimming and Camping's Website;</li>
            <li>remove any copyright or other proprietary notations from the materials; or</li>
            <li>transferring the materials to another person or "mirror" the materials on any other server.</li>
        </ul>

        <p>This will let Global Wild Swimming and Camping to terminate upon violations of any of these restrictions. Upon
            termination, your viewing right will also be terminated and you should destroy any downloaded materials in your
            possession whether it is printed or electronic format.</p>

        <h2>3. Disclaimer</h2>

        <p>All the materials on Global Wild Swimming and Camping’s Website are provided "as is". Global Wild Swimming and
            Camping makes no warranties, may it be expressed or implied, therefore negates all other warranties.
            Furthermore, Global Wild Swimming and Camping does not make any representations concerning the accuracy or
            reliability of the use of the materials on its Website or otherwise relating to such materials or any sites
            linked to this Website.</p>

        <h2>4. Limitations</h2>

        <p>Global Wild Swimming and Camping or its suppliers will not be hold accountable for any damages that will arise
            with the use or inability to use the materials on Global Wild Swimming and Camping’s Website, even if Global
            Wild Swimming and Camping or an authorize representative of this Website has been notified, orally or written,
            of the possibility of such damage. Some jurisdiction does not allow limitations on implied warranties or
            limitations of liability for incidental damages, these limitations may not apply to you.</p>

        <h2>5. Revisions and Errata</h2>

        <p>The materials appearing on Global Wild Swimming and Camping’s Website may include technical, typographical, or
            photographic errors. Global Wild Swimming and Camping will not promise that any of the materials in this Website
            are accurate, complete, or current. Global Wild Swimming and Camping may change the materials contained on its
            Website at any time without notice. Global Wild Swimming and Camping does not make any commitment to update the
            materials.</p>

        <h2>6. Links</h2>

        <p>Global Wild Swimming and Camping has not reviewed all of the sites linked to its Website and is not responsible
            for the contents of any such linked site. The presence of any link does not imply endorsement by Global Wild
            Swimming and Camping of the site. The use of any linked website is at the user’s own risk.</p>

        <h2>7. Site Terms of Use Modifications</h2>

        <p>Global Wild Swimming and Camping may revise these Terms of Use for its Website at any time without prior
            notice. By using this Website, you are agreeing to be bound by the current version of these Terms and Conditions
            of Use.</p>

        <h2>8. Your Privacy</h2>

        <p>Please read our <a href="privacy-policy.php" class="text-decoration-none">Privacy Policy</a>.</p>

        <h2>9. Governing Law</h2>

        <p>Any claim related to Global Wild Swimming and Camping's Website shall be governed by the laws of gb without
            regards to its conflict of law provisions.</p>
    </div>
</main>
<?php include 'footer.php'; ?>
<script>
    changePageNameFooter("Terms of Service");
</script>
</body>

</html>
