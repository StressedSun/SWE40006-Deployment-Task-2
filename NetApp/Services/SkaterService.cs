using SWE40006_Deployment_Task_2.Models;

namespace SWE40006_Deployment_Task_2.Services;

public class SkaterService
{
    private readonly List<Skater> _skaters =
    [
        new Skater
        {
            Id = 1,
            Name = "Ilia Malinin",
            Country = "USA",
            Discipline = "Men's Singles",
            BirthYear = 2004
        },

        new Skater
        {
            Id = 2,
            Name = "Kaori Sakamoto",
            Country = "Japan",
            Discipline = "Women's Singles",
            BirthYear = 2000
        },

        new Skater
        {
            Id = 3,
            Name = "Adam Siao Him Fa",
            Country = "France",
            Discipline = "Men's Singles",
            BirthYear = 2001
        },

        new Skater
        {
            Id = 4,
            Name = "Loena Hendrickx",
            Country = "Belgium",
            Discipline = "Women's Singles",
            BirthYear = 1999
        }
    ];

    public List<Skater> GetAll()
    {
        return _skaters;
    }

    public List<Skater> Search(string? search)
    {
        if (string.IsNullOrWhiteSpace(search))
        {
            return _skaters;
        }

        return _skaters
            .Where(s =>
                s.Name.Contains(search, StringComparison.OrdinalIgnoreCase) ||
                s.Country.Contains(search, StringComparison.OrdinalIgnoreCase) ||
                s.Discipline.Contains(search, StringComparison.OrdinalIgnoreCase))
            .ToList();
    }
}