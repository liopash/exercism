package tree

import "sort"
import "errors"

type Record struct {
	ID     int
	Parent int
}

type Node struct {
	ID       int
	Children []*Node
}

type ByID []Record

func (a ByID) Less(i, j int) bool { return a[i].ID < a[j].ID }
func (a ByID) Len() int           { return len(a) }
func (a ByID) Swap(i, j int)      { a[i], a[j] = a[j], a[i] }

func (n *Node) add(nn Node, i int) {
	if n.ID == i {
		n.Children = append(n.Children, &nn)
	}
	for _, child := range n.Children {
		child.add(nn, i)
	}
}

func (n *Node) find(ID int) bool {
	if n.ID == ID {
		return true
	}
	if len(n.Children) > 0 {
		for _, child := range n.Children {
			if child.find(ID) {
				return true
			}
		}
	}
	return false
}

func Build(r []Record) (*Node, error) {
	if len(r) == 0 {
		return nil, nil
	}
	node := new(Node)
	sort.Sort(ByID(r))

	id := -1
	for _, rec := range r {
		id++
		if rec.ID == 0 && rec.Parent == 0 && id == 0 {
			node = &Node{ID: 0}
			continue
		}
		if rec.ID == id && node.find(rec.Parent) {
			node.add(Node{ID: rec.ID}, rec.Parent)
		} else {
			return nil, errors.New("error - wrong sequence")
		}
	}
	return node, nil
}
