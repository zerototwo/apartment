
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <style>
        /* 设置暖色调绿色长方形的样式 */
        .warm-green-rectangle {
            width: 100vw;  /* 宽度覆盖整个页面宽度 */
            height: 100px; /* 高度为100像素 */
            background-color: black; /* 使用HSL颜色模型设置暖色调绿色 */
            position: fixed; /* 使用固定定位，确保长方形在滚动时保持原位 */
            left: 0; /* 距离左侧0像素 */
            top: 0;  /* 距离顶部0像素 */
            z-index: 2; /* 确保绿色长方形在黑色和黄色长方形之上 */
        }

        /* 设置黑色长方形的样式 */
        .black-rectangle {
            width: 10px; /* 设定黑线的宽度 */
            height: 100vh; /* 黑线高度与视口高度一致 */
            background-color: black; /* 黑线颜色 */
            position: fixed; /* 使用固定定位，确保黑线始终可见 */
            left: calc(20vw); /* 定位在黄色长方形的右侧，保持一定间距（如10px） */
            top: 0; /* 从视口顶部开始 */
            z-index: 1; /* 确保黑线位于所有图层之下 */

        }

        /* 设置黄色长方形的样式 */
        .yellow-rectangle {
            width: calc(60vw - 70px);  /* 宽度不超过页面一半减去黑色长方形的宽度 */
            height: 3800px; 
            background-color: white; /* 背景颜色 */
            position: absolute; /* 使用绝对定位，相对于最近的已定位祖先元素（在这里是body，因为body没有设置position属性，所以它将相对于初始包含块定位） */
            left: calc(20vw); /* 距离左侧220像素（与黑色长方形的宽度相同，以避免重叠） */
            top: 0px;  /* 距离顶部100像素（与暖色调绿色长方形的高度相同，以确保它在绿色长方形的下方） */
            z-index: 0; /* 确保黄色长方形在黑色和绿色长方形之下（在这个例子中不是必需的，因为它们在垂直方向上不重叠，但保持一致的z-index层级是个好习惯） */
            display: flex; /* 使用flex布局来居中文本 */
            //align-items: center; /* 垂直居中 */
            //justify-content: center; /* 水平居中 */
            font-size: 40px; /* 设置字体大小 */
            color: black; /* 设置字体颜色 */
            text-align: left; /* 确保文本在长方形内居中 */
            /* 可选：添加一些内边距来避免文本紧贴边缘 */
            padding: 40px;
        }
     .vertical-black-line {
            width: 10px; /* 设定黑线的宽度 */
            height: 100vh; /* 黑线高度与视口高度一致 */
            background-color: black; /* 黑线颜色 */
            position: fixed; /* 使用固定定位，确保黑线始终可见 */
            left: calc(80vw + 10px); /* 定位在黄色长方形的右侧，保持一定间距（如10px） */
            top: 0; /* 从视口顶部开始 */
            z-index: 1; /* 确保黑线位于所有图层之下 */
        }
        /* 确保body有足够的高度来包含所有内容 */
        body {
            margin: 0; /* 移除默认的边距 */
            padding: 0; /* 移除默认的内边距 */
            height: 200vh; /* 临时设置高度以演示滚动效果，实际使用时可以根据需要调整 */
            background-color: #F5DEB3; /* 羊皮纸色的十六进制代码，可以根据需要调整 */
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <!-- 暖色调绿色长方形 -->
    <div class="warm-green-rectangle"></div>
    
    <!-- 黑色长方形 -->
    <div class="black-rectangle"></div>
    
    <!-- 黄色长方形 -->
    <div class="yellow-rectangle">

    <br><br><br>Frequently Asked Questions<br><br><br><br>1. Rental process<br><br>
     Q: How do I search for a listing?<br>
     A: You can search through our website or APP, using keywords (such as region, price, house type, etc.), and the system will recommend eligible listings for you.<br><br>
     Q: Do I need to make an appointment to see a property?<br>
     A: Yes, in order to ensure your viewing experience, please make an appointment in advance through our platform or by contacting the host.<br><br>
     Q: How do I book a space?<br>
     A: Once you've found a place you want, you can book offline by paying your reservation online or contacting your host.<br><br>
     Q: What do I need to pay attention to when signing a contract?<br>
     A: Before signing the contract, please read the terms of the contract carefully and confirm the key information such as the lease term, rent, deposit, maintenance responsibilities and so on. If you have any questions, please consult our legal counsel or professional customer service.<br><br><br>

2. the condition of the house<br><br>

Q: Is the listing genuine?<br>
A: We rigorously review our listings to ensure authenticity. However, it is advisable to double-check when you view the property.<br><br>
Q: Is the house fully equipped?<br>
A: The amenities are listed in the listing details, so you can choose according to your needs. If you have special requests, please communicate with the host at the time of booking.<br><br>
Q: How hygienic and safe is the house?<br>
A: We ask landlords to clean and maintain their homes regularly to ensure that the living environment is hygienic. At the same time, the property needs to meet local safety standards.<br><br><br>

3. Lease Terms<br><br>

Q: How is the rent and deposit paid?<br>
A: Rent and deposit payments can be made online through our platform or offline in consultation with the landlord. The method and time of payment must be specified in the contract.<br><br>
Q: What is the lease term?<br>
A: The lease term can be negotiated with the landlord according to your needs, and generally ranges from six months to one year.<br><br>
Q: What should I do if I quit early?<br>
If you need to quit early, talk to your landlord in advance and negotiate a solution. Depending on the terms of the contract, you may be liable for liquidated damages.<br><br><br>


4. service support<br><br>

Q: What should I do if I have a problem with my home?<br>
A: In case of damage to housing facilities and other problems, please report for repair through our platform or contact the landlord in time. We will urge the landlord to resolve the issue as soon as possible.<br><br>
Q: How do I contact customer service?<br>
A: You can contact us through the online customer service function on our website or APP, telephone, email, etc. Our customer service team will be available around the clock.<br><br>
Q: How to file a complaint and defend your rights?<br>
A: In the event of a landlord's breach of contract or service quality problems, you can complain and defend your rights through our complaint channels. We will investigate and deal with it in accordance with relevant regulations.
    </div>
    <div class="vertical-black-line"></div>
    <!-- 页面其他内容可以放在这里 -->
    <div style="margin-left: 220px; padding: 20px;">
            </div>
    
</body>
</html>