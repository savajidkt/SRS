<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Test</title>
</head>
<body bgcolor="#EEE8D6" text="#00">
    <div style="background: #EEE8D6;">
        <br />
        <table
            style="font-family: arial, helvetica, sans-serif; font-size: 12px; color: #000; text-align: left; width: 650px;"
            border="0" cellspacing="0" cellpadding="0" align="center">
            <tbody>
                <tr>
                    <td style="color: #ffffff;" height="120" align="center" bgcolor="#000066">
                        <table
                            style="font-family: arial, helvetica, sans-serif; font-size: 14px; color: #e9eaed; text-align: left; line-height: 30px; width: 600px;"
                            border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td style="color: #fff" align="left" class="white_color">
                                        <span style="font-size: 24px;">
                                            @php
                                                echo $emailHeaderFooter['header'] ? $emailHeaderFooter['header'] : '';
                                            @endphp
                                        </span>
                                    </td>
                                    <td align="right"><a href="{{ url('/') }}"><img
                                                src="{{ asset('images/srs_logo.jpg') }}" border="0"
                                                alt="SRS THE DEVELOPMENT" /></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#FFFFFF">
                        <table
                            style="font-family: arial, helvetica, sans-serif; font-size: 14px; color: #000; text-align: left; line-height: 30px; width: 650px;"
                            border="0" cellspacing="0" cellpadding="0">
                            @php
                                echo $emailBody;
                            @endphp
                            <tr>
                                <td bgcolor="#FFFFFF">
                                    <table
                                        style="font-family: arial, helvetica, sans-serif; font-size: 14px; color: #000; text-align: left; line-height: 30px; width: 650px;"
                                        border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td width="25"></td>
                                                <td style="padding-bottom: 15px;">
                                                    <br />
                                                    Kind regards<br />
                                                    SRS THE DEVELOPMENT TEAM
                                                </td>
                                                <td width="25"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            {{-- <tr height="10">
                                <td>&nbsp;
                                </td>
                            </tr> --}}
                            <tr>
                                <td bgcolor="#000066">
                                    <table
                                        style="font-family: arial, helvetica, sans-serif; font-size: 14px; color: #fff;line-height: 36px; width: 650px;"
                                        border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td width="25"></td>
                                                <td align="right" class="white_color" style="float: left;">
                                                    @php
                                                        echo $emailHeaderFooter['footer'] ? $emailHeaderFooter['footer'] : '';
                                                    @endphp
                                                </td>
                                                <td width="25"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" height="30"></td>
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
