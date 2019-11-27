<?php

if (!function_exists('uptime_child_add_svg_icons')) {
add_action('tommusrhodus_add_svg_icons', 'uptime_child_add_svg_icons');

function uptime_child_add_svg_icons($icons) {
    return array_merge($icons, array(
            //<!-- inject:svg -->
            'spg_cpp' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M10.7661 11.2391H12.5052V9.5H14.2444V11.2391H15.9835V12.9783H14.2444V14.7174H12.5052V12.9783H10.7661V11.2391ZM16.8531 11.2391H18.5922V9.5H20.3313V11.2391H22.0705V12.9783H20.3313V14.7174H18.5922V12.9783H16.8531V11.2391Z" fill="#000000"/>
<path d="M10.2574 15.5417L10.6191 17.66C10.3904 17.7817 10.0296 17.8965 9.5374 18.0035C9.04523 18.1104 8.46175 18.167 7.78871 18.1739C5.87219 18.1357 4.42871 17.567 3.45827 16.4678C2.48784 15.3696 2.00175 13.9696 2.00001 12.2678C1.9735 10.3137 2.47835 8.83081 3.75914 7.64C4.88958 6.55913 6.31566 6.01217 8.03479 6C8.68958 6.00609 9.25219 6.06087 9.72175 6.16522C10.1913 6.26957 10.5391 6.38609 10.7661 6.51478L10.24 8.68261L9.34088 8.38087C8.9445 8.29166 8.53935 8.24732 8.13306 8.2487C7.12262 8.24696 6.28958 8.56609 5.63219 9.20522C4.97479 9.84522 4.63479 10.8139 4.61132 12.1122C4.62001 13.2948 4.93219 14.2217 5.54784 14.8948C6.16262 15.5678 7.03045 15.9104 8.14958 15.9235C8.14958 15.9235 8.97412 15.873 9.30175 15.8174C9.62938 15.7618 9.95055 15.6693 10.2574 15.5417Z" fill="#000000"/>
</svg>
',
            'spg_dotnet' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path d="M0.999974 18C0.999974 18 0.824381 15.1797 2.99997 11.5C2.99997 11.5 4.99997 8 6.66228 7.21216H10.4385C10.4385 7.21216 13.3625 7.94453 14.3114 11.6018C14.3114 11.6018 15.0916 15.312 16 17.5C16 17.5 17 14 18.4742 10.7411L20 7.49996H24C23.464 7.9431 21.0451 17.7756 17.7467 17.7756L15.6658 17.7717L13.5849 17.7677C13.5849 17.7677 12.1712 16.8226 11.1072 14.3908C11.1072 14.3908 9.43846 9.74189 8.36647 8.87093C8.36647 8.87093 7.99997 9.87093 6.37039 12.8111C6.37039 12.8111 4.99997 16 3.31247 18H0.999974Z" fill="#000000"/>
<path opacity="0.3" d="M0.999969 18C0.999969 18 0.0243762 13.9956 1.99998 10.5C3.97558 7.0044 6.99997 7.21218 6.99997 7.21218H10.4385C10.4385 7.21218 14.5511 7.34273 15.5 11C15.5 11 16 14.663 16 16.5C16 16.5 15.5 15.0044 17 11C17 11 18.5 8 20 7.49999C21.5 6.99997 24 7.49999 24 7.49999C24 8.49999 23 17 18 17.5H13.0848C13.0848 17.5 10.5 16.5 9.49998 14L8.49997 8.50003C8.49997 8.50003 8.49998 12 6.99997 14.5C6.99997 14.5 5.49998 17.5 3.31247 18H0.999969Z" fill="#000000"/>
</svg>
',
            'spg_facebook' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path d="M24 12.073C24 5.40365 18.629 0 12 0C5.37097 0 0 5.40365 0 12.073C0 18.0988 4.38823 23.0935 10.125 24V15.563H7.07661V12.073H10.125V9.41306C10.125 6.38751 11.9153 4.71627 14.6574 4.71627C15.9706 4.71627 17.3439 4.95189 17.3439 4.95189V7.92146H15.8303C14.34 7.92146 13.875 8.85225 13.875 9.8069V12.073H17.2031L16.6708 15.563H13.875V24C19.6118 23.0935 24 18.0988 24 12.073Z" fill="#000000"/>
</svg>
',
            'spg_java' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4 9H4.13104C4.02099 9 3.91153 9.01481 3.80612 9.04395C3.20797 9.20933 2.86854 9.79029 3.04799 10.3416L5.52001 17.9357C5.80698 18.8173 6.68743 19.4211 7.68612 19.4211H13.3668C14.3655 19.4211 15.246 18.8173 15.5329 17.9357L16.163 16H18.6C20.5158 16 22 14.3941 22 12.5C22 10.6268 20.6102 9 18.6 9H16.9219H11.4ZM16.8141 14L17.7906 11H18.6C19.3898 11 20 11.6118 20 12.5C20 13.3673 19.3351 14 18.6 14H16.8141Z" fill="#000000"/>
    <path opacity="0.3" d="M7.45755 5.53064L8.01277 7.19628C8.16228 7.64483 8.58205 7.94739 9.05487 7.94739C9.80465 7.94739 10.3341 7.21284 10.097 6.50154L9.7685 5.51612C9.5553 4.87652 9.71919 4.17138 10.1926 3.69136L10.8932 2.98105C11.3286 2.53951 11.2607 1.81704 10.7403 1.47976C10.3245 1.21032 9.76132 1.28639 9.44416 1.66699L7.81847 3.61782C7.37506 4.14991 7.23852 4.87355 7.45755 5.53064Z" fill="#000000"/>
    <path opacity="0.3" d="M11.3523 5.53064L11.9075 7.19628C12.057 7.64483 12.4768 7.94739 12.9496 7.94739C13.6994 7.94739 14.2288 7.21284 13.9917 6.50154L13.6633 5.51612C13.4501 4.87652 13.6139 4.17138 14.0874 3.69136L14.7879 2.98105C15.2234 2.53951 15.1554 1.81704 14.635 1.47976C14.2193 1.21032 13.6561 1.28639 13.3389 1.66699L11.7132 3.61782C11.2698 4.14991 11.1333 4.87355 11.3523 5.53064Z" fill="#000000"/>
    <path opacity="0.3" d="M4 21H17C17.5523 21 18 21.4477 18 22C18 22.5523 17.5523 23 17 23H4C3.44771 23 3 22.5523 3 22C3 21.4477 3.44771 21 4 21Z" fill="#000000"/>
</svg>',
            'spg_javascript' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.2732 14.5522C18.8595 15.1957 19.3942 15.8857 19.5255 16.707L19.491 16.6567C19.6126 17.3493 19.4643 17.8055 19.4372 17.889C19.4365 17.8909 19.4355 17.8942 19.4355 17.8942C18.8497 19.8967 15.5872 19.9642 14.2822 18.6472C14.2283 18.5843 14.1779 18.5277 14.1306 18.4745C13.9412 18.2615 13.8007 18.1035 13.6747 17.8155L15.0472 17.0272C15.4185 17.5897 15.7552 17.8942 16.3635 18.0292C17.1855 18.1305 18.018 17.8492 17.838 16.9717C17.7269 16.5532 17.1756 16.3211 16.5323 16.0502C16.0678 15.8546 15.5553 15.6388 15.126 15.318C14.091 14.6205 13.8442 12.933 14.6992 11.9647C14.9917 11.6047 15.4747 11.3347 15.9817 11.211L16.5105 11.1442C17.5342 11.121 18.1635 11.391 18.636 11.9197C18.7725 12.054 18.873 12.1897 19.0755 12.5047C18.8551 12.6419 18.7246 12.7232 18.5948 12.8057C18.406 12.9256 18.2187 13.048 17.7592 13.3485C17.5897 12.9885 17.3197 12.7635 17.0272 12.6735C16.5772 12.5385 16.0035 12.684 15.891 13.1685C15.8467 13.3147 15.8572 13.4497 15.9255 13.6972C16.0713 14.0304 16.4935 14.2122 16.9392 14.4042C17.0504 14.452 17.163 14.5006 17.2732 14.5522ZM11.1022 11.2732H12.7882L12.7852 11.3152C12.7852 11.8336 12.7862 12.3507 12.7872 12.8669C12.7892 13.8968 12.7912 14.9233 12.7852 15.9495C12.7858 16.0893 12.788 16.2269 12.7901 16.3622C12.8027 17.1529 12.8141 17.8634 12.4875 18.459C12.2227 18.999 11.7165 19.3477 11.1292 19.5172C10.227 19.7197 9.36521 19.596 8.72396 19.2135C8.29346 18.9547 7.95971 18.5482 7.73096 18.0757L9.09971 17.232C9.10919 17.232 9.13113 17.2697 9.16119 17.3215C9.17154 17.3393 9.18285 17.3588 9.19496 17.379C9.36971 17.6707 9.52046 17.8732 9.81746 18.0202C10.107 18.111 10.7445 18.177 10.992 17.6602C11.1125 17.4515 11.1064 16.8671 11.0992 16.1688C11.0974 15.9939 11.0955 15.812 11.0955 15.627C11.0955 14.8988 11.0971 14.1735 11.0988 13.4484C11.1005 12.7239 11.1022 11.9997 11.1022 11.2732Z" fill="#000000"/>
<path opacity="0.3" d="M3 3H21V21H3V3ZM19.5255 16.707C19.3943 15.8857 18.8595 15.1958 17.2733 14.5522C16.7213 14.2935 16.1077 14.1135 15.9255 13.6972C15.8572 13.4497 15.8468 13.3147 15.891 13.1685C16.0035 12.684 16.5772 12.5385 17.0272 12.6735C17.3197 12.7635 17.5898 12.9885 17.7593 13.3485C18.5348 12.8415 18.5347 12.8415 19.0755 12.5048C18.873 12.1898 18.7725 12.054 18.636 11.9198C18.1635 11.391 17.5343 11.121 16.5105 11.1442L15.9818 11.211C15.4748 11.3348 14.9917 11.6048 14.6993 11.9648C13.8442 12.933 14.091 14.6205 15.126 15.318C16.1497 16.083 17.6468 16.251 17.838 16.9718C18.018 17.8492 17.1855 18.1305 16.3635 18.0292C15.7553 17.8942 15.4185 17.5897 15.0472 17.0272L13.6747 17.8155C13.8322 18.1755 14.0122 18.3323 14.2823 18.6473C15.5873 19.9643 18.8497 19.8967 19.4355 17.8942C19.4572 17.8267 19.6155 17.3655 19.491 16.6567L19.5255 16.707ZM12.7882 11.2733H11.1023C11.1023 12.7268 11.0955 14.1713 11.0955 15.627C11.0955 16.551 11.1427 17.3993 10.992 17.6603C10.7445 18.177 10.107 18.111 9.8175 18.0203C9.5205 17.8733 9.36975 17.6708 9.195 17.379C9.14775 17.3003 9.1125 17.232 9.09975 17.232L7.731 18.0758C7.95975 18.5483 8.2935 18.9548 8.724 19.2135C9.36525 19.596 10.227 19.7197 11.1292 19.5173C11.7165 19.3477 12.2227 18.999 12.4875 18.459C12.87 17.7615 12.789 16.9065 12.7852 15.9495C12.7942 14.409 12.7852 12.8678 12.7852 11.3153L12.7882 11.2733Z" fill="#000000"/>
</svg>
',
            'spg_linkedin' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24ZM15.629 11.0121C16.1786 11.0121 16.5533 11.1435 16.7532 11.4064C16.953 11.6694 17.0529 12.0762 17.0529 12.6271V18.7867C17.0529 18.9119 17.0967 19.0121 17.1841 19.0872C17.2715 19.1623 17.3652 19.1999 17.4651 19.1999H20.3878C20.4878 19.1999 20.5814 19.1623 20.6689 19.0872C20.7563 19.0121 20.8 18.9119 20.8 18.7867V11.951C20.8 10.649 20.4253 9.65996 19.6759 8.98391C18.9265 8.30785 17.8898 7.96982 16.5658 7.96982C15.3668 7.96982 14.4175 8.30785 13.718 8.98391C13.718 8.85871 13.7056 8.77108 13.6806 8.721V8.5332C13.6556 8.43305 13.6119 8.35793 13.5494 8.30785C13.487 8.25777 13.4058 8.23273 13.3059 8.23273H10.533C10.4331 8.23273 10.3394 8.27655 10.252 8.36419C10.1646 8.45183 10.1209 8.54572 10.1209 8.64588V18.7867C10.1209 18.9119 10.1646 19.0121 10.252 19.0872C10.3394 19.1623 10.4331 19.1999 10.533 19.1999H13.3808C13.5057 19.1999 13.6056 19.1623 13.6806 19.0872C13.7555 19.0121 13.793 18.9119 13.793 18.7867V13.3032C13.793 12.577 13.9304 12.0136 14.2052 11.613C14.4799 11.2124 14.9546 11.0121 15.629 11.0121ZM6.72975 7.10597C7.26683 7.10597 7.72272 6.91192 8.09743 6.52381C8.47214 6.13571 8.65949 5.67248 8.65949 5.13414C8.65949 4.5958 8.47214 4.13884 8.09743 3.76325C7.72272 3.38766 7.26683 3.19987 6.72975 3.19987C6.19267 3.19987 5.73678 3.38766 5.36207 3.76325C4.98736 4.13884 4.80001 4.5958 4.80001 5.13414C4.80001 5.67248 4.98736 6.13571 5.36207 6.52381C5.73678 6.91192 6.19267 7.10597 6.72975 7.10597ZM8.58455 18.7867V8.64588C8.58455 8.54572 8.54084 8.45183 8.4534 8.36419C8.36597 8.27655 8.27229 8.23273 8.17237 8.23273H5.3246C5.1997 8.23273 5.09977 8.27655 5.02483 8.36419C4.94989 8.45183 4.91242 8.54572 4.91242 8.64588V18.7867C4.91242 18.9119 4.94989 19.0121 5.02483 19.0872C5.09977 19.1623 5.1997 19.1999 5.3246 19.1999H8.17237C8.27229 19.1999 8.36597 19.1623 8.4534 19.0872C8.54084 19.0121 8.58455 18.9119 8.58455 18.7867Z" fill="#000000"/>
</svg>
',
            'spg_node' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M4 7.95L12.2424 3L20 7.95V16.5L12.2424 21L4 16.5V7.95Z" fill="black"/>
<path d="M20.2454 6.48124L13.1398 2.47366C12.8745 2.32931 12.5759 2.25354 12.2722 2.25354C11.9686 2.25354 11.6699 2.32931 11.4046 2.47366L4.3087 6.48124C4.04518 6.62993 3.82657 6.84409 3.67506 7.10198C3.52354 7.35988 3.4445 7.65235 3.44594 7.94974V15.9649C3.44548 16.2621 3.52494 16.5542 3.67636 16.8119C3.82778 17.0697 4.04584 17.284 4.3087 17.4334L6.17962 18.4945C6.70679 18.8014 7.31097 18.9589 7.92451 18.9493C8.24794 18.9724 8.5726 18.9254 8.87526 18.8116C9.17793 18.6978 9.45111 18.52 9.67527 18.2909C9.89943 18.0619 10.069 17.7873 10.1719 17.4867C10.2748 17.1861 10.3084 16.8671 10.2704 16.5523V8.63188C10.2707 8.57132 10.258 8.51137 10.2332 8.45586C10.2084 8.40035 10.172 8.35051 10.1264 8.3095C10.0808 8.2685 10.027 8.23723 9.96831 8.2177C9.90965 8.19817 9.84747 8.1908 9.78574 8.19607H8.92298C8.80472 8.19607 8.6913 8.24198 8.60767 8.32371C8.52405 8.40545 8.47706 8.5163 8.47706 8.63188V16.5428C8.47637 16.6548 8.44667 16.7648 8.39073 16.8626C8.3348 16.9603 8.25444 17.0426 8.15717 17.1018C7.9949 17.1778 7.81558 17.2125 7.63591 17.2026C7.45624 17.1926 7.28207 17.1384 7.12962 17.045L5.19084 15.9649V7.96869L12.2674 3.96111L19.3633 7.94974V15.946L12.2868 20.0009L10.4643 18.9114C10.3995 18.8748 10.3259 18.8555 10.251 18.8555C10.1762 18.8555 10.1026 18.8748 10.0378 18.9114C9.71624 19.1071 9.37109 19.263 9.01023 19.3756C8.93325 19.3896 8.86241 19.4261 8.80704 19.4802C8.75167 19.5343 8.71436 19.6035 8.70002 19.6788C8.70002 19.9062 8.93268 20.0483 9.02962 20.1051L11.4046 21.4789C11.6684 21.6277 11.9676 21.7061 12.2722 21.7061C12.5768 21.7061 12.876 21.6277 13.1398 21.4789L20.2454 17.4713C20.5102 17.3208 20.73 17.1052 20.8831 16.8459C21.0362 16.5866 21.1171 16.2927 21.1179 15.9933V7.95921C21.1171 7.65987 21.0362 7.36594 20.8831 7.10665C20.73 6.84736 20.5102 6.63174 20.2454 6.48124Z" fill="#000000"/>
<path d="M14.9525 14.4681C13.0719 14.4681 12.8683 14.0038 12.7617 13.2933C12.7454 13.1895 12.6913 13.095 12.6094 13.0271C12.5274 12.9592 12.4232 12.9225 12.3158 12.9238H11.3949C11.3355 12.9238 11.2767 12.9353 11.222 12.9578C11.1672 12.9803 11.1176 13.0133 11.0761 13.0547C11.0346 13.0962 11.0019 13.1454 10.9801 13.1994C10.9582 13.2533 10.9477 13.311 10.949 13.3691C10.949 14.4112 11.4724 16.1639 14.9525 16.1639C17.3566 16.1639 18.7331 15.2165 18.7331 13.5491C18.7331 11.7205 17.25 11.3795 15.3015 11.1331C13.0816 10.8489 13.0816 10.7068 13.0816 10.4321C13.0816 10.1573 13.0816 9.69307 14.6617 9.69307C16.2418 9.69307 16.4745 10.0247 16.649 10.7826C16.6694 10.8804 16.7242 10.968 16.8039 11.0303C16.8836 11.0927 16.9831 11.1257 17.0852 11.1237H18.0546C18.1167 11.1243 18.1782 11.1119 18.2351 11.0874C18.2919 11.0629 18.3427 11.0268 18.3842 10.9816C18.426 10.9372 18.4579 10.8848 18.4779 10.8277C18.498 10.7706 18.5056 10.7101 18.5005 10.65C18.2969 8.85934 17.0658 7.99719 14.6326 7.99719C12.4612 7.99719 11.1622 8.94461 11.1622 10.47C11.1622 12.3648 12.8974 12.668 14.526 12.829C16.8138 13.0469 16.8138 13.3691 16.8138 13.5964C16.8428 14.0512 16.5714 14.4681 14.9525 14.4681Z" fill="#000000"/>
</svg>
',
            'spg_python' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path d="M9.16221 12.4365H13.7207C14.9884 12.4365 16 11.2533 16 9.81409V4.8929C16 3.49236 14.9585 2.44437 13.7207 2.20773C12.1927 1.92279 10.5323 1.93728 9.16221 2.21256C7.23294 2.59891 6.88294 3.40543 6.88294 4.89773V6.86331H11.4457V7.52011H5.17136C3.84393 7.52011 2.68296 8.42321 2.32015 10.1377C1.90186 12.1032 1.88479 13.3299 2.32015 15.3824C2.64454 16.9085 3.4171 18 4.74454 18H6.31099V15.6432C6.31099 13.9384 7.61282 12.4365 9.16221 12.4365ZM8.87623 5.5497C8.40245 5.5497 8.01831 5.11022 8.01831 4.56932C8.02258 4.0236 8.40245 3.58412 8.87623 3.58412C9.34574 3.58412 9.73416 4.02843 9.73416 4.56932C9.73416 5.11022 9.35001 5.5497 8.87623 5.5497Z" fill="#000000"/>
<path opacity="0.3" d="M20.6642 10.2738C20.3493 8.97748 19.7524 8 18.4808 8H16.8413V9.98853C16.8413 11.5324 15.5656 12.8329 14.11 12.8329H9.74335C8.54946 12.8329 7 13.7708 7 15V19.3816C7 20.5982 8.59034 21.3114 9.74335 21.6596C11.1253 22.0749 12.4541 22.1504 14.11 21.6596C15.2099 21.3324 16.2934 20.6737 16.2934 19.3816V17.6742H11.9308V17.1036H18.4808C19.7524 17.1036 20.2226 16.1932 20.6642 14.8298C21.1221 13.4244 21.1017 12.0735 20.6642 10.2738ZM14.384 18.8111C14.8378 18.8111 15.2058 19.1928 15.2058 19.6627C15.2058 20.1367 14.8378 20.5185 14.384 20.5185C13.9342 20.5185 13.5622 20.1325 13.5622 19.6627C13.5663 19.1886 13.9342 18.8111 14.384 18.8111Z" fill="#000000"/>
</svg>
',
            'spg_swift' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5774 17.0138C13.457 18.2379 10.5419 18.3638 7.60882 17.1074C5.23371 16.0967 3.2636 14.3282 2 12.3077C2.6066 12.8126 3.314 13.2167 4.07181 13.5704C7.10032 14.9906 10.1288 14.8934 12.2573 13.5704C9.22522 11.2466 6.64851 8.21542 4.72881 5.73951C4.32381 5.33451 4.02141 4.82961 3.71811 4.37511C11.1701 9.82102 10.8497 11.2061 5.89071 3.4652C10.2863 7.91122 14.3795 10.4384 14.3795 10.4384C14.5145 10.514 14.6189 10.5779 14.7035 10.6346C14.7917 10.4096 14.8691 10.1756 14.9348 9.93262C15.6422 7.35592 14.834 4.42461 13.0655 2C17.1578 4.47501 19.5834 9.12442 18.5726 13.0151C18.5457 13.1195 18.5177 13.223 18.5222 13.3688C20.5428 15.8951 19.9875 18.5727 19.7346 18.0677C18.6383 15.923 16.6088 16.5782 15.5765 17.0138H15.5774Z" fill="#000000"/>
<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="#000000"/>
</svg>
',
        'spg_angular' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <style>.cls-1{fill:#000000;}.cls-2{fill:#000000;}.cls-3{fill:#000000;}.cls-4{fill:#FFF !important;}</style>
    </defs>
    <title>icon</title>
    <polygon class="cls-1" opacity="0.3" points="0.78 3.89 2.49 18.87 12 24 12 0 0.78 3.89"/>
    <polygon class="cls-2" points="12 0 12 24 21.51 18.87 23.22 3.89 12 0"/>
    <polygon class="cls-3" opacity="0.3" points="9.86 12.04 14.2 12.04 12.07 7.35 9.86 12.04"/>
    <path class="cls-4" opacity="1" d="M12,2.61,8.25,10.66,5.07,17.47H7.33L9,14.06H15l1.6,3.41h2.31ZM9.79,12,12,7.35,14.14,12Z"/>
</svg>
',
        'spg_vue' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <style>.cls-1{fill:#000000;}.cls-2{fill:#000000;}</style>
    </defs>
    <title>icon</title>
    <polygon class="cls-1" points="24 1.73 19.16 1.73 12 14.09 12 14.06 4.84 1.7 0 1.7 12 22.27 12 22.3 24 1.73"/>
    <polygon class="cls-2" opacity="0.5"
             points="19.16 1.73 14.79 1.73 12 6.33 12 6.31 9.21 1.7 4.84 1.7 12 14.06 12 14.09 19.16 1.73"/>
</svg>
',
        'spg_react' => '<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <style>
            .cls-1{fill:#000000;}.cls-2,.cls-4{fill:none;stroke-miterlimit:10;stroke-width:2px;}.cls-2{stroke:#000000;}.cls-3{fill:#000000;}.cls-4{stroke:#000000;}
        </style>
    </defs>
    <title>icon</title>
    <circle class="cls-1" cx="8.46" cy="16.93" r="1.63"/>
    <path class="cls-2" d="M8.46,16.93C4.93,13.48,4.76,1.7,12.08,1.7,16.23,1.7,17.4,6.06,17.4,8"/>
    <circle class="cls-3" opacity="0.3" cx="10.51" cy="9.42" r="1.63"/>
    <path class="cls-4" opacity="0.3" d="M10.51,9.42c4.69-1.54,15.21,3.77,11.83,10.25-1.92,3.68-6.33,2.7-8,1.81"/>
    <circle class="cls-1" cx="16.57" cy="14.63" r="1.63"/>
    <path class="cls-2" d="M16.57,14.63c-1,4.83-10.85,11.3-14.78,5.13-2.23-3.5.82-6.83,2.44-7.86"/>
</svg>
',

            //<!-- endinject -->
    ));
    }
}
