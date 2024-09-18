<table class="table table-bordered" style="">
	<thead>
		<tr>
			<th colspan="2"><h3>{vtranslate('Steps of getting Client ID, Client Secrete and Redirect URL', $MODULE)}</h3></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td rowspan="2">{vtranslate('Step', $MODULE)} 1</td>	
			<td>{vtranslate('Create Account in Microsoft Azure.', $MODULE)}</td>
		</tr>
		<tr>
			<td>{vtranslate('To Create Account, Click on the below link', $MODULE)},<br>
				<a href="https://portal.azure.com/" target="_blank">https://portal.azure.com/</a></td>	
		</tr>
		<tr>
			<td rowspan="2">{vtranslate('Step', $MODULE)} 2</td>	
			<td>{vtranslate('After Login in Azur App, Click on the App Registrations for Creating the App and getting Client ID, Client Secrete and Redirect URL', $MODULE)}</td>	
		</tr>
		<tr>
			<td>{vtranslate('Follow all the below screenshot to Register App', $MODULE)}<br>
				<b>{vtranslate('Note', $MODULE)} : </b> {vtranslate("Once App Creation complete, you will see Client Secret. So just Copy it and keep in safe place because later on you can't able to get Client Secret", $MODULE)} <br>
				<a href ="https://prnt.sc/d5YjQXXoh9Oa" target="_blank">https://prnt.sc/d5YjQXXoh9Oa</a> <br>
				<a href ="https://prnt.sc/AGB_G7Ix-qSa" target="_blank">https://prnt.sc/AGB_G7Ix-qSa</a> <br>
				<a href ="https://prnt.sc/2C2d_69v4hLW" target="_blank">https://prnt.sc/2C2d_69v4hLW</a> <br>
				<a href ="https://prnt.sc/Hyw6K2C4UQug" target="_blank">https://prnt.sc/Hyw6K2C4UQug</a> <br>
				<a href ="https://prnt.sc/cQrJEspEZ6YX" target="_blank">https://prnt.sc/cQrJEspEZ6YX</a> <br>
				<a href ="https://prnt.sc/UddXOqegTwoy" target="_blank">https://prnt.sc/UddXOqegTwoy</a> <br>
				<a href ="https://prnt.sc/F7iXA1zofnRh" target="_blank">https://prnt.sc/F7iXA1zofnRh</a> <br>
			</td>	
		</tr>
		<tr>
			<td rowspan="2">{vtranslate('Step', $MODULE)} 3</td>	
			<td>{vtranslate('Create Redirect URL for Token Generation', $MODULE)}</td>	
		</tr>
		<tr>
			<td> {vtranslate('Follow All the below screenshot to Create Redirect URL and add in the App', $MODULE)}<br>
				<a href="https://prnt.sc/vA4rUIUESiQK" target="_blank">https://prnt.sc/vA4rUIUESiQK</a> <br>
				{if $TYPE eq 'Contacts'}
					<a href="https://prnt.sc/WApQiEgsYlXD" target="_blank">https://prnt.sc/WApQiEgsYlXD</a> <br>
				{else}
					<a href="https://prnt.sc/3RUb2kyI_kUq" target="_blank">https://prnt.sc/3RUb2kyI_kUq</a> <br>
				{/if}
			</td>	
		</tr>

		<tr>
			<td rowspan="2">{vtranslate('Step', $MODULE)} 4</td>	
			<td> {vtranslate('Give API Permission', $MODULE)} </td>
		</tr>

		<tr>
			<td>
			{vtranslate('Follow All the below screenshot to give API Permission', $MODULE)}  <br>
			<a href="https://prnt.sc/pVjQdKzyhEfe" target="_blank">https://prnt.sc/pVjQdKzyhEfe</a> <br>
			<a href ="https://prnt.sc/if1stKNAoRv9" target="_blank"> https://prnt.sc/if1stKNAoRv9</a> <br>
			<a href="https://prnt.sc/bkGqGQPzzcle" target="_blank"> https://prnt.sc/bkGqGQPzzcle</a> <br>
			<a href="https://prnt.sc/dI2yB-cXWu94" target="_blank"> https://prnt.sc/dI2yB-cXWu94</a> <br>
			{vtranslate('Also give permission to email, Contacts, Group, Group Member, People, User. After that give grant permission as shown in the below screenshot', $MODULE)} <br>
			<a href="https://prnt.sc/NxaLxsHYxgrL" target="_blank">https://prnt.sc/NxaLxsHYxgrL</a>
			</td>	
		</tr>
	</tbody>
</table>