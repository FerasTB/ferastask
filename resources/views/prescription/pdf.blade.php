{{-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Prescription</title>
</head>

<body class="dark:bg-gray-800 dark:text-white">
        <h1>{{ $prescription->advice }}</h1>
    <table class="table table-bordered">
        <tr>
            <td>Drug</td>
            <td>option</td>
            <td>duration</td>
        </tr>
        @foreach ($prescription->drugs as $item)
            <tr>
                <td>{{ $item->drug_id }}</td>
                <td>{{ $item->option_id }}</td>
                <td>{{ $item->duration }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html> --}}


{{-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <title></title>

</head>

<body style="background-image: url(images/background4.jpg);">
    <br>

    <br>

    <form method="post" action="generateprescription.php"><big><big>PRESCRIPTION :<br>
                <br>
            </big></big>
        <table width:="50%">
            <tbody>
                <tr>
                    <td>Doctor Name : <br>
                    </td>
                    <td><input name="doc_name" type="text"><br>
                    </td>
                </tr>
                <tr>
                    <td>Patient ID : <br>
                    </td>
                    <td><input name="id" type="text"><br>
                    </td>
                </tr>
                <tr>
                    <td>Medicine : <br>
                    </td>
                    <td>
                        <textarea cols="30" rows="3" name="medicine"></textarea><br>
                    </td>
                </tr>
                <tr>
                    <td>Dosage : <br>
                    </td>
                    <td>
                        <input name="dose" type="checkbox" checked> Morning<br>
                        <input name="dose" type="checkbox"> Afternoon<br>
                        <input name="dose" type="checkbox"> Night<br>
                    </td>
                </tr>
                <tr>
                    <td>Diagnosis :<br>
                    </td>
                    <td>
                        <textarea cols="30" rows="3" name="diagnosis"></textarea><br>
                    </td>
                </tr>
                <tr>
                    <td>Additional Instructions :<br>
                    </td>
                    <td>
                        <textarea cols="30" rows="3" name="instructions"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <big><big><br>
            </big></big>
        <img src="{{ asset('storage/privet/6.png') }}" />
    </form>

</body>

</html> --}}

<!DOCTYPE html>

<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title>Your Prescription</title>
</head>

<body>
    <div class="es-wrapper-color">
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
            background="https://amzajk.stripocdn.email/content/guids/CABINET_4e9f8bf644e9fef047666008d7df2416/images/7921105_1.png"
            style="background-position: center top;">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table cellpadding="0" cellspacing="0" class="esd-header-popover es-header" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0"
                                            cellspacing="0" width="530">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="490" align="left"
                                                                        class="esd-container-frame">
                                                                        <table cellpadding="0" cellspacing="0"
                                                                            width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        class="esd-block-image es-p30b"
                                                                                        style="font-size: 0px;"><a
                                                                                            target="_blank"
                                                                                            href="https://viewstripo.email"><img
                                                                                                src="https://amzajk.stripocdn.email/content/guids/CABINET_4e9f8bf644e9fef047666008d7df2416/images/group_4075961.png"
                                                                                                alt="Logo"
                                                                                                style="display: block;"
                                                                                                height="22"
                                                                                                title="Logo"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        class="esd-block-text">
                                                                                        <h1>DR.Haik Serobian<br></h1>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        class="esd-block-text es-p15t es-p15b">
                                                                                        <p>وصفة باسم : فراس طيب
                                                                                            المحترم<br></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                                            cellspacing="0" width="530">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure esdev-adapt-off es-p20t es-p20r es-p20l"
                                                        align="left">
                                                        <table width="490" cellpadding="0" cellspacing="0"
                                                            class="esdev-mso-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0"
                                                                            class="es-left" align="left">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="229"
                                                                                        class="es-m-p0r esd-container-frame"
                                                                                        align="center">
                                                                                        <table cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center"
                                                                                                        class="esd-block-text">
                                                                                                        <h3>Drug</h3>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="20"></td>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0"
                                                                            class="es-left" align="left">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="118"
                                                                                        class="esd-container-frame"
                                                                                        align="center">
                                                                                        <table cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center"
                                                                                                        class="esd-block-text">
                                                                                                        <h3>Time of use
                                                                                                        </h3>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="20"></td>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0"
                                                                            class="es-right" align="right">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="103" align="center"
                                                                                        class="esd-container-frame">
                                                                                        <table cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center"
                                                                                                        class="esd-block-text">
                                                                                                        <h3>Duration
                                                                                                        </h3>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p40b es-p20r es-p20l"
                                                        align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="490" class="esd-container-frame"
                                                                        align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0"
                                                                            width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        class="esd-block-text">
                                                                                        <table border="1"
                                                                                            cellspacing="1"
                                                                                            bordercolor="#E1A248"
                                                                                            cellpadding="1"
                                                                                            class="es-table"
                                                                                            style="height: 100px; width: 100%;">
                                                                                            <tbody>
                                                                                                <tr
                                                                                                    style="height: 70px;">
                                                                                                    <td align="left">
                                                                                                        <p class="es-p10r es-p10l"
                                                                                                            style="font-size: 14px; font-family: manrope, arial, sans-serif;">
                                                                                                            Drug 1</p>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <p class="es-p10r es-p10l"
                                                                                                            style="font-size: 14px; font-family: manrope, arial, sans-serif;">
                                                                                                            Time 1</p>
                                                                                                    </td>
                                                                                                    <td class="es-p10r es-p10l"
                                                                                                        style="font-size: 14px; font-family: manrope, arial, sans-serif;">
                                                                                                        duration 1</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-footer esd-footer-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table bgcolor="#ffffff" class="es-footer-body" align="center"
                                            cellpadding="0" cellspacing="0" width="530">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p40t es-p40b es-p20r es-p20l"
                                                        align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="490" class="esd-container-frame"
                                                                        align="left">
                                                                        <table cellpadding="0" cellspacing="0"
                                                                            width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        class="esd-block-social es-p10t es-p10b"
                                                                                        style="font-size:0">
                                                                                        <table cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            class="es-table-not-adapt es-social">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center"
                                                                                                        valign="top"
                                                                                                        class="es-p35r"
                                                                                                        esd-tmp-icon-type="facebook">
                                                                                                        <a target="_blank"
                                                                                                            href="https://viewstripo.email"><img
                                                                                                                title="Facebook"
                                                                                                                src="https://amzajk.stripocdn.email/content/assets/img/social-icons/logo-colored/facebook-logo-colored.png"
                                                                                                                alt="Fb"
                                                                                                                height="24"></a>
                                                                                                    </td>
                                                                                                    <td align="center"
                                                                                                        valign="top"
                                                                                                        class="es-p35r"
                                                                                                        esd-tmp-icon-type="twitter">
                                                                                                        <a target="_blank"
                                                                                                            href="https://viewstripo.email"><img
                                                                                                                title="Twitter"
                                                                                                                src="https://amzajk.stripocdn.email/content/assets/img/social-icons/logo-colored/twitter-logo-colored.png"
                                                                                                                alt="Tw"
                                                                                                                height="24"></a>
                                                                                                    </td>
                                                                                                    <td align="center"
                                                                                                        valign="top"
                                                                                                        class="es-p35r"
                                                                                                        esd-tmp-icon-type="instagram">
                                                                                                        <a target="_blank"
                                                                                                            href="https://viewstripo.email"><img
                                                                                                                title="Instagram"
                                                                                                                src="https://amzajk.stripocdn.email/content/assets/img/social-icons/logo-colored/instagram-logo-colored.png"
                                                                                                                alt="Inst"
                                                                                                                height="24"></a>
                                                                                                    </td>
                                                                                                    <td align="center"
                                                                                                        valign="top"
                                                                                                        esd-tmp-icon-type="youtube">
                                                                                                        <a target="_blank"
                                                                                                            href="https://viewstripo.email"><img
                                                                                                                title="Youtube"
                                                                                                                src="https://amzajk.stripocdn.email/content/assets/img/social-icons/logo-colored/youtube-logo-colored.png"
                                                                                                                alt="Yt"
                                                                                                                height="24"></a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        class="esd-block-text es-p10t es-p10b">
                                                                                        <p>تم صرف هذه الوثيقة
                                                                                            &nbsp;الكترونيا من قبل
                                                                                            الدكتور هايك سيروبيان&nbsp;
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p20" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="490" class="esd-container-frame"
                                                                        align="left">
                                                                        <table cellpadding="0" cellspacing="0"
                                                                            width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        class="esd-block-image es-infoblock made_with"
                                                                                        style="font-size:0"><a
                                                                                            target="_blank"
                                                                                            href="https://viewstripo.email/?utm_source=templates&utm_medium=email&utm_campaign=email_list_2&utm_content=birthday_wish_list"><img
                                                                                                src="https://amzajk.stripocdn.email/content/guids/CABINET_09023af45624943febfa123c229a060b/images/7911561025989373.png"
                                                                                                alt width="125"
                                                                                                style="display: block;"></a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
