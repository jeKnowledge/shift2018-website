<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Shift APPens</title>
  </head>
  <body style="background: #1a1a1a; margin: 0; padding: 0; serif; font-family: sans-serif;">
    <table align="center" bgcolor="#F5F5F5" border="0" cellpadding="0" cellspacing="0" style="width: 90vw; max-width: 600px; margin-top: 48px; margin-bottom: 48px;">
    <!--
     <tr>
      <td align="center" style="padding-top: 64px; padding-bottom: 42px;">
       <img src="https://shiftappens.com/images/shift18/logo-text.svg" width="300" height="80" alt="ShiftAPPens" title="ShiftAPPens" style="display:block"/>
      </td>
    -->
     </tr>
     <tr>
      <td style="font-size: 36px; color: #F2684A; font-weight: 700; padding-left: 42px; padding-right: 42px; padding-top: 24px;">
       Hello Shifter!
      </td>
     </tr>
     <tr>
      <td style="font-size: 22px; color: #212121; font-weight: lighter; padding-left: 42px; padding-right: 42px; padding-top: 24px; padding-bottom: 48px;">
       {!! $text !!}
      </td>
     </tr>
     <a href="{{ $url }}" style= "
                                color: #F2684A;
                                border-radius: 0.2rem;
                                text-transform: uppercase;
                                letter-spacing: 0.06rem;
                                font-weight: bold;
                                font-size: 1rem;
                                padding-left: 24px 42px 48px 42px;
                                text-decoration: none;
                                display: inline-block;
                                text-align: center;
                                line-height: 1;
                                cursor: pointer;
                                -webkit-appearance: none;
                                -webkit-transition:
                                background-color 0.25s ease-out, color 0.25s ease-out;
                                transition: background-color 0.25s ease-out, color 0.25s ease-out;
                                vertical-align: middle;
                                border: 1px solid transparent;"
     >{{ $button }}</a>
     <tr>
       <td align="center" style="padding-bottom: 24px;">
        <a href="http://www.shiftappens.com/" style="font-size: 14px; color: #F2684A; font-weight: lighter; text-decoration: none;">shiftappens.com</a>
       </td>
     </tr>
    </table>
  </body>
</html>
