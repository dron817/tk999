<div id="place-piker">
    <table>
        <tr>
            <td><input type="checkbox" onclick="pickPlace(19)" @if ($ticket_buy[19]==1) disabled @endif id="19" value="19"><label
                    for="19">19</label></td>
            <td></td>
            <td><input type="checkbox" onclick="pickPlace(3)" @if ($ticket_buy[3]==1) disabled @endif id="3" value="3"><label for="3">3</label>
            </td>
            <td><input type="checkbox" onclick="pickPlace(6)" @if ($ticket_buy[6]==1) disabled @endif id="6" value="6"><label for="6">6</label>
            </td>
            <td><input type="checkbox" onclick="pickPlace(9)" @if ($ticket_buy[9]==1) disabled @endif id="9" value="9"><label for="9">9</label>
            </td>
            <td><input type="checkbox" onclick="pickPlace(12)" @if ($ticket_buy[12]==1) disabled @endif id="12" value="12"><label
                    for="12">12</label></td>
            <td><input type="checkbox" onclick="pickPlace(15)" @if ($ticket_buy[15]==1) disabled @endif id="15" value="15"><label
                    for="15">15</label></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="checkbox" onclick="pickPlace(16)" @if ($ticket_buy[16]==1) disabled @endif id="16" value="16"><label
                    for="16">16</label></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="checkbox" onclick="pickPlace(1)" @if ($ticket_buy[1]==1) disabled @endif id="1" value="1"><label for="1">1</label>
            </td>
            <td><input type="checkbox" onclick="pickPlace(4)" @if ($ticket_buy[4]==1) disabled @endif id="4" value="4"><label for="4">4</label>
            </td>
            <td><input type="checkbox" onclick="pickPlace(7)" @if ($ticket_buy[7]==1) disabled @endif id="7" value="7"><label for="7">7</label>
            </td>
            <td><input type="checkbox" onclick="pickPlace(10)" @if ($ticket_buy[10]==1) disabled @endif id="10" value="10"><label
                    for="10">10</label></td>
            <td><input type="checkbox" onclick="pickPlace(13)" @if ($ticket_buy[13]==1) disabled @endif id="13" value="13"><label
                    for="13">13</label></td>
            <td><input type="checkbox" onclick="pickPlace(17)" @if ($ticket_buy[17]==1) disabled @endif id="17" value="17"><label
                    for="17">17</label></td>
        </tr>
        <tr>
            <td><input type="checkbox" id="0" value="0" disabled><label for="0">В</label></td>
            <td><input type="checkbox" onclick="pickPlace(2)" @if ($ticket_buy[2]==1) disabled @endif id="2" value="2"><label for="2">2</label>
            </td>
            <td><input type="checkbox" onclick="pickPlace(5)" @if ($ticket_buy[5]==1) disabled @endif id="5" value="5"><label for="5">5</label>
            </td>
            <td><input type="checkbox" onclick="pickPlace(8)" @if ($ticket_buy[8]==1) disabled @endif id="8" value="8"><label for="8">8</label>
            </td>
            <td><input type="checkbox" onclick="pickPlace(11)" @if ($ticket_buy[11]==1) disabled @endif id="11" value="11"><label
                    for="11">11</label></td>
            <td><input type="checkbox" onclick="pickPlace(14)" @if ($ticket_buy[14]==1) disabled @endif id="14" value="14"><label
                    for="14">14</label></td>
            <td><input type="checkbox" onclick="pickPlace(18)" @if ($ticket_buy[18]==1) disabled @endif id="18" value="18"><label
                    for="18">18</label></td>
        </tr>
    </table>
</div>
