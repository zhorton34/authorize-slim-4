<template>
    <div style="overflow-x:scroll !important">
        <table>
            <tr>
                <th>Line</th>
                <th>Function</th>
                <th>Class</th>
                <th>Type</th>
                <th>File</th>
            </tr>
            <tr v-for="trace in stack">
                <td>{{ trace.line || '-' }}</td>
                <td>{{ trace['function'] || '-' }}</td>
                <td>{{ trace.class || '-' }}</td>
                <td>{{ trace.type || '-' }}</td>
                <td>{{ trace.file || '-' }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
	export default {
		props: ['stack'],
		created() {
			console.log(this.stack)
		}
	}
</script>
