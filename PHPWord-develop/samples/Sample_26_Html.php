<?php
include_once 'Sample_Header.php';

// New Word Document
echo date('H:i:s') , ' Create new PhpWord object' , EOL;
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();
$html = '<h1>Adding element via HTML</h1>';
$html .= '<p>Some well formed HTML snippet needs to be used</p>';
$html .= '<p>With for example <strong>some<sup>1</sup> <em>inline</em> formatting</strong><sub>1</sub></p>';
$html .= '<p>Unordered (bulleted) list:</p>';
$html .= '<ul><li>Item 1</li><li>Item 2</li><ul><li>Item 2.1</li><li>Item 2.1</li></ul></ul>';
$html .= '<p>Ordered (numbered) list:</p>';
$html .= '<table cellspacing="0" cellpadding="0" width="574"><tbody><tr class="firstRow"><td width="55" style="border-width: 1px; border-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">序号</span></p></td><td width="160" style="border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">性能及规格</span></p></td><td width="312" style="border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">参数</span></p></td><td width="47" style="border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-top-color: windowtext; border-right-color: windowtext; border-bottom-color: windowtext; border-left: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">备注</span></p></td></tr><tr><td width="55" style="border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">1</span></p></td><td width="160" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">外形尺寸</span></p></td><td width="312" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">820mm</span><span style=";font-family:宋体">×485mm×320mm</span></p></td><td width="47" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><br/></td></tr><tr><td width="55" style="border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">2</span></p></td><td width="160" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">重量</span></p></td><td width="312" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">13-18kg</span></p></td><td width="47" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><br/></td></tr><tr><td width="55" style="border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">3</span></p></td><td width="160" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">使用范围</span></p></td><td width="312" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">8w</span><span style=";font-family:宋体">以上各类功放及小型电子设备，可扩展</span></p></td><td width="47" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><br/></td></tr><tr><td width="55" style="border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">4</span></p></td><td width="160" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">连续工作时长</span></p></td><td width="312" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">400</span><span style=";font-family:宋体">小时</span></p></td><td width="47" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><br/></td></tr><tr><td width="55" style="border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">5</span></p></td><td width="160" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">工作温度</span></p></td><td width="312" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">小于50摄氏度</span></p></td><td width="47" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><br/></td></tr><tr><td width="55" style="border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">6</span></p></td><td width="160" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">风扇转速</span></p></td><td width="312" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">2400-3000RPM</span></p></td><td width="47" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><br/></td></tr><tr><td width="55" style="border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">7</span></p></td><td width="160" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">功耗</span></p></td><td width="312" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">30.4W</span></p></td><td width="47" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><br/></td></tr><tr><td width="55" style="border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">8</span></p></td><td width="160" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">防雨</span></p></td><td width="312" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">IP3</span></p></td><td width="47" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><br/></td></tr><tr><td width="55" style="border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-top: none; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">9</span></p></td><td width="160" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">防盐雾等级</span></p></td><td width="312" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><p style="text-align:center;line-height:33px"><span style=";font-family:宋体">一级</span></p></td><td width="47" style="border-top: none; border-left: none; border-bottom-width: 1px; border-bottom-color: windowtext; border-right-width: 1px; border-right-color: windowtext; padding: 0px 7px;"><br/></td></tr></tbody></table><p style="text-indent:32px"><span style="font-family:宋体">中频频率（MHz）：950-1450 MHz</span></p><p style="text-indent:32px"><span style="font-family:宋体">射频频率（GHz）：14.00–14.50 GHz</span></p><p style="text-indent:32px"><span style="font-family:宋体">输出功率 (PSAT) (dBm)：+53</span></p><p style="text-indent:32px"><span style="font-family:宋体">P</span><span style="font-size:11px;line-height:150%;font-family:宋体">LINEAR1</span><span style="font-family:宋体">:49dBm</span></p><p style="text-indent:32px"><span style="font-family:宋体">P</span><span style="font-size:11px;line-height:150%;font-family:宋体">LINEAR2</span><span style="font-family:宋体">:50.5dBm</span></p><p style="text-indent:32px"><span style="font-family:宋体">转换增益：72±3dB@min</span></p><p style="text-indent:32px"><span style="font-family:宋体">增益调整范围：20dB</span></p><p style="text-indent:32px"><span style="font-family:宋体">增益平坦度：全波段最大值3.0 dB（峰-峰），0.5 dB（峰-峰）/40 MHz</span></p><p style="text-indent:32px"><span style="font-family:宋体">温度增益起伏：±1.5 dB</span></p><p style="text-indent:32px"><span style="font-family:宋体">输入VWSR：1.4：1（最小值）</span></p><p style="text-indent:32px"><span style="font-family:宋体">输出VWSR：1.3：1（最小值）</span></p><p style="text-indent:32px"><span style="font-family:宋体">噪声功率密度：-70 dBm/Hz（发射），-145dBm/Hz（接收）</span></p><p style="text-indent:32px"><span style="font-family:宋体">额定功率杂散：-55dBc（最大值）</span></p><p style="text-indent:32px"><span style="font-family:宋体">额定功率谐波：-50 dBc（最大值）@ P</span><span style="font-size:11px;line-height:150%;font-family:宋体">LINEAR2</span></p><p style="text-indent:32px"><span style="font-family:宋体">调幅调相变换（典型值）： 2.5°/dB（P1dB点）</span></p><p style="text-indent:32px"><span style="font-family:宋体">三阶互调（双音）：P1dB 点至 3dB 补偿点 -25 dBc（最大值）</span></p><p style="text-indent:32px"><span style="font-family:宋体">本振频率(LO)：13.05 GHz</span></p><p style="text-indent:32px"><span style="font-family:宋体">相位噪声： -53 dBc/Hz（10Hz频率点），-63 dBc/Hz（100Hz频率点），-73 dBc/Hz（1000Hz频率点），-83 dBc/Hz（10kHz频率点），-95 dBc/Hz（100 kHz频率点）</span></p><p style="text-indent:32px"><span style="font-family:宋体">40MHz</span><span style="font-family:宋体">群延迟（最大值）： 1 nsec p-p（最大）</span></p><p style="text-indent:32px"><span style="font-family:宋体">外部参考频率：10MHz</span></p><p style="text-indent:32px"><span style="font-family:宋体">外部参考频率相位噪声：-120 dBc/Hz（10Hz频率点），-135 dBc/Hz（100Hz频率点），-150 dBc/Hz（1000Hz频率点），-155 dBc/Hz（10kHz频率点），-160 dBc/Hz（100 kHz频率点）</span></p><p style="text-indent:32px"><span style="font-family:宋体">输入接口：RF或者N型</span></p><p style="text-indent:32px"><span style="font-family:宋体">输出接口：WR-75接口（波导管口）</span></p><p style="text-indent:32px"><span style="font-family:宋体">监控口：提供 RS232/485监控口（MS3112）</span></p><p style="text-indent:32px"><span style="font-family:宋体">交流输入电压：90-265VAC </span></p><p style="text-indent:32px"><span style="font-family:宋体">功耗（正常值）：950W</span></p><p style="text-indent:32px"><span style="font-family:宋体">物理尺寸(L×W×H)：470x254x229mm</span></p><p style="text-indent:32px"><span style="font-family:宋体">重量：22kg</span></p><p style="text-indent:32px"><span style="font-family:宋体">工作温度：-30°C to +55°C</span></p><p style="text-indent:32px"><span style="font-family:宋体">贮存温度：-55°C to +85°C</span></p><p style="text-indent:32px"><span style="font-family:宋体">湿度：100%冷凝水</span></p><p><br/></p>';

\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
}
