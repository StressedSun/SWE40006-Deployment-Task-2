using SWE40006_Deployment_Task_2.Services;

var builder = WebApplication.CreateBuilder(args);

builder.Services.AddSingleton<SkaterService>();

var app = builder.Build();

app.UseStaticFiles();

app.MapGet("/", (string? search, SkaterService service) =>
{
    var skaters = service.Search(search);

    var rows = string.Join("", skaters.Select(s => $"""
        <tr>
            <td>{s.Name}</td>
            <td>{s.Country}</td>
            <td>{s.Discipline}</td>
            <td>{s.BirthYear}</td>
        </tr>
        """));

    var html = $$"""
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Figure Skating Database</title>
        <link rel="stylesheet" href="/styles.css">
    </head>

    <body>
        <main>
            <h1>Figure Skating Database</h1>

            <p>
                Search figure skaters by name, country or discipline.
            </p>

            <form method="get">
                <input
                    type="text"
                    name="search"
                    value="{{search}}"
                    placeholder="Search skaters..."
                >

                <button type="submit">
                    Search
                </button>

                <a href="/">
                    Clear
                </a>
            </form>

            <p>
                Results: {{skaters.Count}}
            </p>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Discipline</th>
                        <th>Birth Year</th>
                    </tr>
                </thead>

                <tbody>
                    {{rows}}
                </tbody>
            </table>
        </main>
    </body>
    </html>
    """;

    return Results.Content(html, "text/html");
});

app.Run();