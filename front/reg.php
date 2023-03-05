<fieldset>
    <legend>會員註冊</legend>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td> <input type="text" name="acc" id="acc"> </td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td> <input type="password" name="pw" id="pw"> </td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td> <input type="password" name="pw2" id="pw2"> </td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td> <input type="password" name="email" id="email"> </td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="reset()">清除</button>
            </td>
        </tr>
    </table>
</fieldset>


<script>
    function reset() {
        $("#acc,#pw,#pw2,#email").val('')
    }

    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }
        if (user.acc === '' || user.pw === '' || user.pw2 === '' || user.email === '') {
            alert('不可空白')
        } else {
            if (acc.pw === acc.pw2) {
                $.post("./api/chk_acc.php", user, (result) => {
                    if (parseInt === 1) {
                        alert('帳號重複')
                    } else {
                        $.post("./api/reg.php", user, () => {
                            alert('註冊完成,歡迎加入')
                            reset();
                        })

                    }
                })
            } else {
                alert('密碼錯誤')
            }

        }
    }



    // function reg() {
    //     let user = {
    //         acc: $("#acc").val(),
    //         pw: $("#pw").val(),
    //         pw2: $("#pw2").val(),
    //         email: $("#email").val()
    //     }
    //     if (user.acc === '' ||
    //         user.pw === '' ||
    //         user.pw2 === '' ||
    //         user.email === '') {
    //         alert('不可空白')
    //     } else {
    //         if (user.pw == user.pw2) {
    //             $.post("./chk_acc.php", user, (result) => {
    //                 if (parseInt(result) === 1) {
    //                     alert('帳號重複')
    //                 } else {
    //                     $.post("./reg.php", user, () => {
    //                         alert('註冊完成,歡迎加入')
    //                         reset();
    //                     })
    //                 }
    //             })
    //         } else {
    //             alert('第二組密碼錯誤')
    //         }
    //     }
    // }
</script>