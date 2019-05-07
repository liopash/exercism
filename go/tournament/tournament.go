package tournament

import (
	"encoding/csv"
	"errors"
	"fmt"
	"io"
	"sort"
)

type Team struct {
	name           string
	MP, W, D, L, P int
}

type Score struct {
	name   string
	points int
}

func (t *Team) countP() *Team {
	t.P = 3*t.W + t.D
	return t
}

func (t *Team) String() string {
	return fmt.Sprintf("%-31v|%3v |%3v |%3v |%3v |%3v", t.name, t.MP, t.W, t.D, t.L, t.P)
}

func Tally(reader io.Reader, output io.Writer) error {
	db := make(map[string]*Team)

	r := csv.NewReader(reader)
	r.Comma = ';'
	r.Comment = '#'

	records, err := r.ReadAll()
	if err != nil {
		fmt.Println(err)
		return err
	}

	for _, item := range records {
		if len(item) != 3 {
			return errors.New("Input error - invalid row")
		}
		err := procTally(item[0], item[1], item[2], db)
		if err != nil {
			return err
		}

	}

	var ordered = make([]Score, len(db))
	i := 0
	for _, v := range db {
		ordered[i] = Score{name: v.name, points: v.P}
		i++
	}
	sort.Slice(ordered, func(i, j int) bool {
		if ordered[i].points == ordered[j].points {
			return ordered[i].name < ordered[j].name
		}
		return ordered[i].points > ordered[j].points
	})

	fmt.Fprint(output, "Team                           | MP |  W |  D |  L |  P\n")
	for idx := range ordered {
		fmt.Fprintln(output, db[ordered[idx].name])
	}

	return nil
}

func procTally(team1 string, team2 string, wdl string, db map[string]*Team) error {
	_, found := db[team1]
	if !found {
		db[team1] = &Team{name: team1}
	}
	_, found = db[team2]
	if !found {
		db[team2] = &Team{name: team2}
	}
	switch wdl {
	case "win":
		db[team1].W++
		db[team2].L++
	case "loss":
		db[team1].L++
		db[team2].W++
	case "draw":
		db[team1].D++
		db[team2].D++
	default:
		return errors.New("Input error - not win/loss/draw")
	}
	db[team1].countP().MP++
	db[team2].countP().MP++
	return nil
}
