<div id="place-piker" class="tong">
    <table>
        <tr>
            <td></td>
            <td><input type="checkbox" onclick="pickPlace(4)" @if ($ticket_buy[4]==1) disabled @endif id="4" value="4"><label for="4">4</label></td>
            <td><input type="checkbox" onclick="pickPlace(8)" @if ($ticket_buy[8]==1) disabled @endif id="8" value="8"><label for="8">8</label></td>
            <td><input type="checkbox" onclick="pickPlace(12)" @if ($ticket_buy[12]==1) disabled @endif id="12" value="12"><label for="12">12</label></td>
            <td><input type="checkbox" onclick="pickPlace(16)" @if ($ticket_buy[16]==1) disabled @endif id="16" value="16"><label for="16">16</label></td>
            <td><input type="checkbox" onclick="pickPlace(20)" @if ($ticket_buy[20]==1) disabled @endif id="20" value="20"><label for="20">20</label></td>
            <td><input type="checkbox" onclick="pickPlace(24)" @if ($ticket_buy[24]==1) disabled @endif id="24" value="24"><label for="24">24</label></td>
            <td></td>
            <td></td>
            <td><input type="checkbox" onclick="pickPlace(32)" @if ($ticket_buy[32]==1) disabled @endif id="32" value="32"><label for="32">32</label></td>
            <td><input type="checkbox" onclick="pickPlace(36)" @if ($ticket_buy[36]==1) disabled @endif id="36" value="36"><label for="36">36</label></td>
            <td><input type="checkbox" onclick="pickPlace(40)" disabled id="40" value="40"><label for="40">40</label></td>
            <td><input type="checkbox" onclick="pickPlace(44)" disabled id="44" value="44"><label for="44">44</label></td>
            <td><input type="checkbox" onclick="pickPlace(48)" disabled id="48" value="48"><label for="48">48</label></td>
            <td><input type="checkbox" onclick="pickPlace(49)" disabled id="49" value="49"><label for="49">49</label></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="checkbox" onclick="pickPlace(3)" @if ($ticket_buy[3]==1) disabled @endif id="3" value="3"><label for="3">3</label></td>
            <td><input type="checkbox" onclick="pickPlace(7)" @if ($ticket_buy[7]==1) disabled @endif id="7" value="7"><label for="7">7</label></td>
            <td><input type="checkbox" onclick="pickPlace(11)" @if ($ticket_buy[11]==1) disabled @endif id="11" value="11"><label for="11">11</label></td>
            <td><input type="checkbox" onclick="pickPlace(15)" @if ($ticket_buy[15]==1) disabled @endif id="15" value="15"><label for="15">15</label></td>
            <td><input type="checkbox" onclick="pickPlace(19)" @if ($ticket_buy[19]==1) disabled @endif id="19" value="19"><label for="19">19</label></td>
            <td><input type="checkbox" onclick="pickPlace(23)" @if ($ticket_buy[23]==1) disabled @endif id="23" value="23"><label for="23">23</label></td>
            <td></td>
            <td></td>
            <td><input type="checkbox" onclick="pickPlace(31)" @if ($ticket_buy[31]==1) disabled @endif id="31" value="31"><label for="31">31</label></td>
            <td><input type="checkbox" onclick="pickPlace(35)" @if ($ticket_buy[35]==1) disabled @endif id="35" value="35"><label for="35">35</label></td>
            <td><input type="checkbox" onclick="pickPlace(39)" @if ($ticket_buy[39]==1) disabled @endif id="39" value="39"><label for="39">39</label></td>
            <td><input type="checkbox" onclick="pickPlace(43)" disabled id="43" value="43"><label for="43">43</label></td>
            <td><input type="checkbox" onclick="pickPlace(47)" disabled id="47" value="47"><label for="47">47</label></td>
            <td><input type="checkbox" onclick="pickPlace(50)" disabled id="50" value="50"><label for="50">50</label></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="checkbox" onclick="pickPlace(51)"disabled id="51" value="51"><label for="51">51</label></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="checkbox" onclick="pickPlace(1)" @if ($ticket_buy[1]==1) disabled @endif id="1" value="1"><label for="1">1</label></td>
            <td><input type="checkbox" onclick="pickPlace(5)" @if ($ticket_buy[5]==1) disabled @endif id="5" value="5"><label for="5">5</label></td>
            <td><input type="checkbox" onclick="pickPlace(9)" @if ($ticket_buy[9]==1) disabled @endif id="9" value="9"><label for="9">9</label></td>
            <td><input type="checkbox" onclick="pickPlace(13)" @if ($ticket_buy[13]==1) disabled @endif id="13" value="13"><label for="13">13</label></td>
            <td><input type="checkbox" onclick="pickPlace(17)" @if ($ticket_buy[17]==1) disabled @endif id="17" value="17"><label for="17">17</label></td>
            <td><input type="checkbox" onclick="pickPlace(21)" @if ($ticket_buy[21]==1) disabled @endif id="21" value="21"><label for="21">21</label></td>
            <td><input type="checkbox" onclick="pickPlace(25)" @if ($ticket_buy[25]==1) disabled @endif id="25" value="25"><label for="25">25</label></td>
            <td><input type="checkbox" onclick="pickPlace(27)" @if ($ticket_buy[27]==1) disabled @endif id="27" value="27"><label for="27">27</label></td>
            <td><input type="checkbox" onclick="pickPlace(30)" @if ($ticket_buy[30]==1) disabled @endif id="30" value="30"><label for="30">30</label></td>
            <td><input type="checkbox" onclick="pickPlace(33)" @if ($ticket_buy[33]==1) disabled @endif id="33" value="33"><label for="33">33</label></td>
            <td><input type="checkbox" onclick="pickPlace(37)" @if ($ticket_buy[37]==1) disabled @endif id="37" value="37"><label for="37">37</label></td>
            <td><input type="checkbox" onclick="pickPlace(41)" disabled id="41" value="41"><label for="41">41</label></td>
            <td><input type="checkbox" onclick="pickPlace(45)" disabled id="45" value="45"><label for="45">45</label></td>
            <td><input type="checkbox" onclick="pickPlace(52)" disabled id="52" value="52"><label for="52">52</label></td>
        </tr>
        <tr>
            <td><input type="checkbox" id="0" value="0" disabled><label for="0">В</label></td>
            <td><input type="checkbox" onclick="pickPlace(2)" @if ($ticket_buy[2]==1) disabled @endif id="2" value="2"><label for="2">2</label></td>
            <td><input type="checkbox" onclick="pickPlace(6)" @if ($ticket_buy[6]==1) disabled @endif id="6" value="6"><label for="6">6</label></td>
            <td><input type="checkbox" onclick="pickPlace(10)" @if ($ticket_buy[10]==1) disabled @endif id="10" value="10"><label for="10">10</label></td>
            <td><input type="checkbox" onclick="pickPlace(14)" @if ($ticket_buy[14]==1) disabled @endif id="14" value="14"><label for="14">14</label></td>
            <td><input type="checkbox" onclick="pickPlace(18)" @if ($ticket_buy[18]==1) disabled @endif id="18" value="18"><label for="18">18</label></td>
            <td><input type="checkbox" onclick="pickPlace(22)" @if ($ticket_buy[22]==1) disabled @endif id="22" value="22"><label for="22">22</label></td>
            <td><input type="checkbox" onclick="pickPlace(26)" @if ($ticket_buy[26]==1) disabled @endif id="26" value="26"><label for="26">26</label></td>
            <td><input type="checkbox" onclick="pickPlace(28)" @if ($ticket_buy[28]==1) disabled @endif id="28" value="28"><label for="28">28</label></td>
            <td><input type="checkbox" onclick="pickPlace(29)" @if ($ticket_buy[29]==1) disabled @endif id="29" value="29"><label for="29">29</label></td>
            <td><input type="checkbox" onclick="pickPlace(34)" @if ($ticket_buy[34]==1) disabled @endif id="34" value="34"><label for="34">34</label></td>
            <td><input type="checkbox" onclick="pickPlace(38)" @if ($ticket_buy[38]==1) disabled @endif id="38" value="38"><label for="38">38</label></td>
            <td><input type="checkbox" onclick="pickPlace(42)" disabled id="42" value="42"><label for="42">42</label></td>
            <td><input type="checkbox" onclick="pickPlace(46)" disabled id="46" value="46"><label for="46">46</label></td>
            <td><input type="checkbox" onclick="pickPlace(53)" disabled id="53" value="53"><label for="53">53</label></td>
        </tr>

    </table>

</div>
